<?php
class Auth_model extends CI_Model {
 
    public $status;
    public $aturan;
   
    function __construct(){
        // Call the Model constructor
        parent::__construct();        
        $this->status = $this->config->item('status');
        $this->aturan = $this->config->item('aturan');
    }    
   
    public function insertUser($d)
    {   
        // $this->db->where('id_user_level', '8');
        // // $this->db->or_where('id_user_level', '0');
        // $this->db->select('RIGHT(tbl_user.id_users,5) as kode', FALSE);
        // $this->db->order_by('kode','DESC');    
        // $this->db->limit(1);    
        // $query = $this->db->get('tbl_user'); 
        // if($query->num_rows() <> 0){      
        //     //jika kode ternyata sudah ada.      
        //     $data = $query->row();      
        //     $kode = intval($data->kode) + 1;    
        // }else {      
        //     //jika kode belum ada      
        //     $kode = 1;    
        // }
        // $kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT);
        // $kodejadi = date("y").$d['kelamin']."-".$kodemax;        
        $kodejadi = $this->no_pendaftaran();        

            $string2 = array(
                'no_pendaftaran'=>$kodejadi,
                'nama'=>$d['full_name'],
                'email_pribadi'=>$d['email'],
                'alamat'=>$d['alamat'],
                'prodi'=>$d['prodi'],
                'status'=>'D',
                'tgl_daftar'=>date("Y-m-d"),
                'tahun_kurikulum'=>$this->session->userdata('tahun'),
                'nisn'=>$d['nisn']
            );
            $this->db->insert('pmb_mahasiswa',$string2);            
            // $this->db->query($q2);

            $string = array(
                'id_users'=>$kodejadi,
                'full_name'=>$d['full_name'],
                'email'=>$d['email'],
                'kode_prodi'=>$d['kode_prodi'],
                'aturan'=>$this->aturan[0],
                'status'=>$this->status[0]
            );
            $this->db->insert('tbl_user',$string);
            return $kodejadi; 
    }
    public function cekUser($d)
    {   
        $this->db->select('id_users');
        $this->db->where('id_user_level', '0');
        $this->db->where('email', $d);        
        $query = $this->db->get('tbl_user')->result();
        foreach ($query as $row) {
            return $id_users = $row->id_users;
        }
        return $id_users; 
    }
   
    public function isDuplicate($email)
    {    
        $this->db->get_where('tbl_user', array('email' => $email), 1);
        return $this->db->affected_rows() > 0 ? TRUE : FALSE;        
    }
   
    public function insertToken($user_id)
    {  
        $token = substr(sha1(rand()), 0, 30);
        $date = date('Y-m-d');
       
        $string = array(
                'token'=> $token,
                'user_id'=>$user_id,
                'created'=>$date
            );
        $query = $this->db->insert_string('tokens',$string);
        $this->db->query($query);
        return $token . $user_id;
       
    }
   
    public function isTokenValid($token)
    {
       $tkn = substr($token,0,30);
       $uid = substr($token,30);      
       
        $q = $this->db->get_where('tokens', array(
            'tokens.token' => $tkn,
            'tokens.user_id' => $uid), 1);                        
               
        if($this->db->affected_rows() > 0){
            $row = $q->row();            
           
            $created = $row->created;
            $createdTS = strtotime($created);
            $today = date('Y-m-d');
            $todayTS = strtotime($today);
           
            if($createdTS != $todayTS){
                return false;
            }
           
            $user_info = $this->getUserInfo($row->user_id);
            return $user_info;
           
        }else{
            return false;
        }
       
    }    
   
    public function getUserInfo($id)
    {
        $q = $this->db->get_where('tbl_user', array('id_users' => $id), 1);  
        if($this->db->affected_rows() > 0){
            $row = $q->row();
            return $row;
        }else{
            error_log('no user found getUserInfo('.$id.')');
            return false;
        }
    }
   
    public function updateUserInfo($post)
    {
        $data = array(
               'password' => $post['password'],
               'id_user_level' => '8',
               'terakhir_masuk' => date('Y-m-d h:i:s A'),
               'status' => $this->status[1]
            );
        $this->db->where('id_users', $post['user_id']);
        $this->db->update('tbl_user', $data);
        $success = $this->db->affected_rows();
       
        if(!$success){
            error_log('Unable to updateUserInfo('.$post['user_id'].')');
            return false;
        }
       
        $user_info = $this->getUserInfo($post['user_id']);
        return $user_info;
    }
   
    public function checkLogin($post)
    {
        $this->load->library('encript');      
        $this->db->select('*');
        $this->db->where('id_users', $post['id_user']);
        $query = $this->db->get('tbl_user');
        $userInfo = $query->row();
       
        if(!$this->encript->validate_password($post['password'], $userInfo->password)){
            error_log('Unsuccessful login attempt('.$post['id_users'].')');
            return false;
        }
       
        // $this->updateLoginTime($userInfo->id_users);
       
        unset($userInfo->password);
        return $userInfo;
    }
   
    // public function updateLoginTime($id)
    // {
    //     $this->db->where('id_users', $id);
    //     $this->db->update('tbl_user', array('terakhir_masuk' => date('Y-m-d h:i:s A')));
    //     return;
    // }
   
    public function getUserInfoByEmail($email)
    {
        $q = $this->db->get_where('tbl_user', array('email' => $email), 1);  
        if($this->db->affected_rows() > 0){
            $row = $q->row();
            return $row;
        }else{
            error_log('no user found getUserInfo('.$email.')');
            return false;
        }
    }
   
    public function updatePassword($post)
    {  
        $this->db->where('id_users', $post['user_id']);
        $this->db->update('tbl_user', array('password' => $post['password']));
        $success = $this->db->affected_rows();
       
        if(!$success){
            error_log('Unable to updatePassword('.$post['user_id'].')');
            return false;
        }        
        return true;
    }

    public function no_pendaftaran()   {
          $this->db->select('RIGHT(pmb_mahasiswa.no_pendaftaran,4) as kode', FALSE);
          // $this->db->where('prodi', $kode_prodi);    
          $this->db->order_by('no_pendaftaran','DESC');    
          $this->db->limit(1);    
          $query = $this->db->get('pmb_mahasiswa'); 
          if($query->num_rows() <> 0){      
           //jika kode ternyata sudah ada.      
           $data = $query->row();      
           $kode = intval($data->kode) + 1;    
          }
          else {      
           //jika kode belum ada      
           $kode = 1;    
          }
          // $prodi_id = str_pad($id, 2, "0", STR_PAD_LEFT);
          $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
          $kodejadi = date("ym")."-".$kodemax;
          return $kodejadi;  
    }
   
}