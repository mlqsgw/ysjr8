<?php
/*
 *    mysql表结构处理类
 *    创建数据表，增加，编辑，删除表中字段
 *
 */
namespace Org\Util;
class Msqlstruct
{
    /*
     * 创建数据库，
     * table 要查询的表名
     */
    function createTable($sql,$table){
       M()->execute($sql);
       return $this->checkTable($table);
    }
    /**
     *删除表
     * @param 表明 $table
     * return bool    
     */
    function dropTable($table){
        $sql="DROP TABLE `__PREFIX__{$table}`";
        M()->execute($sql);
        if($this->checkTable($table)){
            return false;
        }else{
            return true;
        }
    }
    /*
     * 检测表是否存在，也可以获取表中所有字段的信息
     * table 要查询的表名
     * return 表里所有字段的信息
     */
    function checkTable($table){
        $sql="desc `__PREFIX__{$table}`";
        $info=M()->execute($sql);
        return $info;
    }
    
    /*
     * 检测字段是否存在，也可以获取字段信息(只能是一个字段)
     * table 表名
     * field 字段名
     */
    function checkField($table,$field){
        $sql='desc `__PREFIX__'.$table.'` `'.$field.'`'; 
        $info=M()->execute($sql);                       
        return $info;
    }
    
    /*
     * 添加字段
     * table 表名
     * info  字段信息数组 array
     * return 字段信息 array
     */
    function addField($table,$info){
        $sql="alter table `__PREFIX__{$table}` add ";               
        $sql.=$this->filterFieldInfo($info); 
        M()->execute($sql);              
       return $this->checkField($table,$info['name']);
    }
    
    /*     
     * 修改字段类型
     * 不能修改字段名称，只能修改
     */
    function editField($table,$info){
        $sql="alter table `__PREFIX__{$table}` modify ";
        $sql.=$this->filterFieldInfo($info);     
        M()->execute($sql);      
       return $this->checkField($table,$info['name']);
    }
    /**
     * 修改字段名称
     * alter table     tablename    change   old_field_name    new_field_name  old_type;
     */
    function changeField($table,$old_field_name,$info){
        $sql="alter table `__PREFIX__{$table}` change  `{$old_field_name}` ";
        $sql.=$this->filterFieldInfo($info);
        M()->execute($sql);    
       return $this->checkField($table,$info['name']);
    }
             
    
    /*
     * 字段信息数组处理，供添加更新字段时候使用
     * info[name]   字段名称
     * info[type]   字段类型
     * info[length]  字段长度
     * info[isNull]  是否为空
     * info['default']   字段默认值
     * info['comment']   字段备注
     */
    private function filterFieldInfo($info){        
        if(!is_array($info))
            return
            $newInfo=array();
        $newInfo['name']=$info['name'];
        $newInfo['type']=$info['type'];
        switch($info['type']){
            case 'varchar':
            case 'char':                
                $newInfo['length']=empty($info['length'])?100:$info['length'];               
                $newInfo['isNull']=$info['isNull']==1?'NULL':'NOT NULL';
                $newInfo['default']=empty($info['default'])?'':'DEFAULT '.$info['default'];
                $newInfo['comment']=empty($info['comment'])?'':'COMMENT '.$info['comment'];
                break;
            case 'int':
                $newInfo['length']=empty($info['length'])?7:$info['length'];
                $newInfo['isNull']=$info['isNull']==1?'NULL':'NOT NULL';
                $newInfo['default']=empty($info['default'])?'':'DEFAULT '.$info['default'];
                $newInfo['comment']=empty($info['comment'])?'':'COMMENT '.$info['comment'];
                break;
            case 'text':
                $newInfo['length']='';
                $newInfo['isNull']=$info['isNull']==1?'NULL':'NOT NULL';
                $newInfo['default']='';
                $newInfo['comment']=empty($info['comment'])?'':'COMMENT '.$info['comment'];
                break;
        }      
        $sql="`".$newInfo['name']."` ".$newInfo['type']." ";
        $sql.=(!empty($newInfo['length']))?'('.$newInfo['length'].') ':' ';
        $sql.=$newInfo['isNull'].' ';
        $sql.=$newInfo['default'];
        $sql.=$newInfo['comment'];
        return $sql;
    }
    
    /*
     * 删除字段
     * 如果返回了字段信息则说明删除失败，返回false，则为删除成功
     */
    function dropField($table,$field){
        $sql="alter table `__PREFIX__{$table}` drop column `{$field}`";
        M()->execute($sql);
        if($this->checkField($table,$field)){
            return false;
        }else{
            return true;
        }
    }
    
    /*
     * 获取指定表中指定字段的信息(多字段)
     */
    function getFieldInfo($table,$field){
        $info=array();
        if(is_string($field)){
            $this->checkField($table,$field);
        }else{
            foreach($field as $v){
                $info[$v]=$this->checkField($table,$v);
            }
        }
        return $info;
    }
    
}

?>