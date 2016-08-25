<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

Class UserModel extends CI_Model
{
    /*USER FUNCTIONS*/
    /*VERIFICAREA DATELOR INTODUSE PENTRU LOGARE*/
    function login($username, $password)
    {
        $this->db->select('id, username, password');
        $this->db->from('members');
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
/*PREIA DACA USERUL ARE AVATAR SAU NU*/
    function getavatar($username)
    {
        $this->load->database();
        $this->db->select('avatar');
        $this->db->from('members');
        $this->db->where('username', $username);
        $this->db->limit(1);

        $query = $this->db->get();
        $data = $query->result_array();

        //echo($data[0]['avatar']);
        return $data[0]['avatar'];

    }
/**/
    function getAvatar_All()
    {
        $sql = "SELECT avatar FROM members";
        $result = $this->db->query($sql);
        return $result->result_array();


    }

    function delete_account($username)
    {
        $this->db->where('username', $username);
        $this->db->delete('members');


    }

    function delete_journals($username)
    {
        $this->db->where('username', $username);
        $this->db->deletE('journals');
    }

    function update_avatar($username)
    {
        $this->db->where('username', $username);
        $this->db->set('avatar', '1');
        $this->db->update('members');
    }

    function getPosts($username)
    {
        $this->db->select("journal_title,journal_text,odata,id,share");
        $this->db->from('journals');
        $this->db->where('username = ', $username);
        $this->db->order_by("odata", "desc");
        $query = $this->db->get();

        return $query->result();
    }

    function delete_post($id, $id_of_user)
    {
        $this->db->where('id', $id);
        $this->db->where('username', $id_of_user);
        $query = $this->db->get('journals');
        if ($query->num_rows() > 0) {
            $this->db->where('id', $id);
            $this->db->delete('journals');
        } else {
            return FALSE;
        }
    }

    function edit_post($id)
    {
        $this->db->select('journal_text');
        $this->db->from('journals');
        $this->db->where('id= ', $id);
        $query = $this->db->get();

        return $query->result_array();

    }

    function update_posts($id, $journal_text, $journal_title, $share, $img_path)
    {
        $this->load->database();
        $this->db->set('journal_text', $journal_text);
        $this->db->set('journal_title', $journal_title);
        $this->db->set('share', $share);
        $this->db->set('img_path', $img_path);
        $this->db->where('id', $id);
        $this->db->update('journals');

    }

    function getDiscoverPosts($page)
    {
        $this->db->select("journal_title,journal_text,odata,username,id,img_path");
        $this->db->from('journals');
        $this->db->where('share = 0');
        $this->db->where('warned=0');
        $this->db->order_by("odata", "desc");
        $this->db->limit(6, ($page - 1) * 6);
        $query = $this->db->get();
        return $query->result();
    }

    function getMapJournals($username)
    {
        $this->db->select("journal_title,journal_text,odata,username,id,longitude,latitude");
        $this->db->from('journals');
        $this->db->where('username', $username);
        $this->db->where('share', 0);

        $query = $this->db->get();
        return $query->result();
    }

    function getNumberOfPosts()
    {
        /* $this->db->select("id");
         $this->db->from('journals');
         $this->db->where('share = 0');*/
        $test = "SELECT share FROM journals WHERE share=0";
        $result = $this->db->query($test);
        return $result->num_rows();
    }

    function get_warn_posts($username)
    {
        $sql = "SELECT journal_title FROM journals WHERE share ='0' AND warned ='1' AND username = '{$username}'";
        $result = $this->db->query($sql);
        return $result->result_array();
        //  $this->db
        //      ->select("journal_title")
        //      ->from("journals")
        //      ->where('share = 0')
        //      ->or_where('warned = 1')
        //      ->or_where('username',$username);
        //  $query = $this->db->get();
        //  return $query->result_array();

    }

    function comments($id = Null)
    {
        if (!empty($_POST)) {
            $this->load->helper('htmlpurifier');
            $message = html_purify($this->input->post('message'));
            $username = $this->session->userdata('username');
            $insert = array(
                'message' => $message,
                'username' => $username,
                'id_of_post' => $id

            );

            $this->db->insert('comments', $insert);
            return $this->returnMarkup($message,$username);
        }

    }

    private function returnMarkup($message,$username)
    {

        return '<div class="comment" style="text-align: left;margin-top:50px"><span style="float:left;position:relative;top:-30px">'.$username.':</span><span>' . $message . '</span></div>';

    }

    function check_title($id)
    {
        $this->db->select('journal_title,id')
            ->from('journals')
            ->where('id', $id)
            ->limit(1);

        $query = $this->db->get();
        $data = $query->result_array();
        return $data[0];

        /* $sql="SELECT journal_title FROM journals WHERE id='{$id}'";
         $result=$this->db->get($sql);
         return $result[0]['result'];*/


    }

    function get_info_post($id)
    {
        $this->db->select("journal_title,journal_text,odata,username,id,img_path");
        $this->db->from('journals');
        $this->db->where('id', $id);
        //$this->db->where('journal_title',$title);
        $query = $this->db->get();
        return $query->result_array();


    }

    function get_comments($id)
    {
        $this->db->select("message,username,odata,id")
            ->from('comments')
            ->where('id_of_post', $id)
            ->order_by("odata", "desc")
            ->limit(100);

        $query = $this->db->get();
        return $query->result_array();


    }

    /*Voting Sistem*/
    function check_for_votes($id_of_post, $id_of_comment, $username)
    {
        $this->db->select('id')
            ->where('username', $username)
            ->where('id_of_post', $id_of_post)
            ->where('id_of_comment', $id_of_comment);
        $query = $this->db->get('votes');
        if ($query->num_rows() > 0) {
            return FALSE;
        } else {
            return TRUE;
        }

    }

    function accept_vote($id_of_post, $id_of_comment, $username)
    {

        $values = array(
            'id_of_post' => $id_of_post,
            'id_of_comment' => $id_of_comment,
            'username' => $username,
            'upvote' => '1'
        );
        $this->db->insert('votes', $values);


    }

    function delete_vote($id_of_post, $id_of_comment, $username)
    {

        $this->db->where('id_of_post', $id_of_post)
            ->where('id_of_comment', $id_of_comment)
            ->where('username', $username);

        $this->db->delete('votes');


    }
    function delete_commentDb($id_of_post, $id_of_comment, $username){
        $this->db->select('id')->where('id_of_post',$id_of_post)->where('id',$id_of_comment)->where('username',$username);
        $this->db->delete('comments');
        return TRUE;
    }

    function count_upvotes_comment($id_of_post, $id_of_comment)
    {
        $this->db->select('id')
            ->where('id_of_post', $id_of_post)
            ->where('id_of_comment', $id_of_comment)
            ->where('upvote', '1');
        $query = $this->db->get('votes');

        return $query->num_rows();

    }

    function get_comment_id($id)
    {
        $this->db->select("id")
            ->from('comments')
            ->where('id_of_post', $id)
            ->order_by("odata", "desc")
            ->limit(100);
        $query = $this->db->get();
        return $query->result_array();


    }

    function number_of_comments($id_of_post)
    {
        $this->db->select('id')
            ->where('id_of_post', $id_of_post);
        $query = $this->db->get('comments');

        return $query->num_rows();

    }

    //
    function check_id($username)
    {
        $this->db->select('username');
        $this->db->from('members');
        $this->db->where('username', $username);
        $query = $this->db->get();
        return $query->result_array();
    }

//Update image on discover/comment
    function update_img($username)
    {
        $img_path = 'uploads/' . $username . '.jpg';
        $this->db->set('img_path', $img_path);
        $this->db->where('username', $username);
        $this->db->update('journals');


    }
}

