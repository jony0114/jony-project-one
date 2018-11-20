<?php
    /**
     * Created by JetBrains PhpStorm.
     * User: taoqili
     * Date: 12-1-16
     * Time: ����11:44
     * To change this template use File | Settings | File Templates.
     */
    header("Content-Type: text/html; charset=gbk");
    error_reporting( E_ERROR | E_WARNING );

    //��Ҫ������Ŀ¼�б����ʹ������ͼ��ַ������������ʱ���ܻ�������ص���ʱ
    $paths = array('upload/','upload1/');

    $action = htmlspecialchars( $_POST[ "action" ] );
    if ( $action == "get" ) {
        $files = array();
        foreach ( $paths as $path){
            $tmp = getfiles( $path );
            if($tmp){
                $files = array_merge($files,$tmp);
            }
        }
        if ( !count($files) ) return;
        rsort($files,SORT_STRING);
        $str = "";
        foreach ( $files as $file ) {
            $str .= $file . "ue_separate_ue";
        }
        echo $str;
    }

    /**
     * ������ȡĿ¼�µ�ָ�����͵��ļ�
     * @param $path
     * @param array $files
     * @return array
     */
    function getfiles( $path , &$files = array() )
    {
        if ( !is_dir( $path ) ) return null;
        $handle = opendir( $path );
        while ( false !== ( $file = readdir( $handle ) ) ) {
            if ( $file != '.' && $file != '..' ) {
                $path2 = $path . '/' . $file;
                if ( is_dir( $path2 ) ) {
                    getfiles( $path2 , $files );
                } else {
                    if ( preg_match( "/\.(gif|jpeg|jpg|png|bmp)$/i" , $file ) ) {
                        $files[] = $path2;
                    }
                }
            }
        }
        return $files;
    }
