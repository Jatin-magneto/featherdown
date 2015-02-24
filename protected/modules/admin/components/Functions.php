<?php
class Functions
{
    public static function insertEnvironmentContent($data,$id,$flag) {
        foreach($data as $key => $value){
            $environment_content = new EnvironmentContent;
            $environment_content->primary_table_id = $id;
            $environment_content->language_id = $key;
            $environment_content->env_title = $value['env_title'];        
            $environment_content->env_sub_title = $value['env_sub_title'];
            $environment_content->env_title_slug = $value['env_title_slug'];
            $environment_content->env_desc = $value['env_desc'];
            $environment_content->primary_table_flag = $flag;
            $environment_content->save();
        }
    }
    
    public static function updateEnvironmentContent($data,$id,$flag) {
        $environment_content = EnvironmentContent::model()->deleteAll(array('condition'=>"primary_table_id=$id and primary_table_flag=$flag"));
        
        Functions::insertEnvironmentContent($data,$id,$flag);
        //foreach($data as $key => $value){
        //    $environment_content = EnvironmentContent::model()->findAll(array('condition'=>"primary_table_id=$id and language_id=$key and primary_table_flag=$flag"));
        //    $environment_content = $environment_content[0];
        //    $environment_content->env_title = $value['env_title'];        
        //    $environment_content->env_sub_title = $value['env_sub_title'];
        //    $environment_content->env_title_slug = $value['env_title_slug'];
        //    $environment_content->env_desc = $value['env_desc'];
        //    $environment_content->save();
        //}
    }
    
    public static function deleteEnvironmentContent($id,$flag) {    
        $environment_content = EnvironmentContent::model()->deleteAll(array('condition'=>"primary_table_id IN ($id) and primary_table_flag=$flag"));
    }
    
    private $data = array();
    
    public function makeDropDown($parents)
    {
        global $data;
        $data = array();
        $data['0'] = 'Root Category';
        foreach($parents as $parent)
        {
            
                $data[$parent->category_id] = $parent->title;
                $this->subDropDown($parent->children);
                

        }
        
       return $data;
    }
    
    
    public function subDropDown($children,$space = '-')
    {
        global $data;
        
        foreach($children as $child)
                {
                    
                        $data[$child->category_id] = $space.$child->title;
                        $this->subDropDown($child->children,$space.'-');
                }
        
    }

}
?>