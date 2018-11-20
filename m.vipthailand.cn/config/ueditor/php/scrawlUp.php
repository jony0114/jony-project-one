<?php
    header("Content-Type:text/html;charset=gbk");
    error_reporting( E_ERROR | E_WARNING );
    include "Uploader.class.php";
    //�ϴ�����
    $config = array(
        "savePath" => "upload/" ,             //�洢�ļ���
        "maxSize" => 1000 ,                   //������ļ����ߴ磬��λKB
        "allowFiles" => array( ".gif" , ".png" , ".jpg" , ".jpeg" , ".bmp" )  //������ļ���ʽ
    );
    //��ʱ�ļ�Ŀ¼
    $tmpPath = "tmp/";

    //��ȡ��ǰ�ϴ�������
    $action = htmlspecialchars( $_GET[ "action" ] );
    if ( $action == "tmpImg" ) { // �����ϴ�
        //������������ʱĿ¼��
        $config[ "savePath" ] = $tmpPath;
        $up = new Uploader( "upfile" , $config );
        $info = $up->getFileInfo();
        /**
         * �������ݣ����ø�ҳ���ue_callback�ص�
         */
        echo "<script>parent.ue_callback('" . $info[ "url" ] . "','" . $info[ "state" ] . "')</script>";
    } else {
        //Ϳѻ�ϴ����ϴ���ʽ������base64����ģʽ�����Ե�������������Ϊtrue
        $up = new Uploader( "content" , $config , true );
        //�ϴ��ɹ���ɾ����ʱĿ¼
        if(file_exists($tmpPath)){
            delDir($tmpPath);
        }
        $info = $up->getFileInfo();
        echo "{'url':'" . $info[ "url" ] . "',state:'" . $info[ "state" ] . "'}";
    }
    /**
     * ɾ������Ŀ¼
     * @param $dir
     * @return bool
     */
    function delDir( $dir )
    {
        //��ɾ��Ŀ¼�µ������ļ���
        $dh = opendir( $dir );
        while ( $file = readdir( $dh ) ) {
            if ( $file != "." && $file != ".." ) {
                $fullpath = $dir . "/" . $file;
                if ( !is_dir( $fullpath ) ) {
                    unlink( $fullpath );
                } else {
                    delDir( $fullpath );
                }
            }
        }
        closedir( $dh );
        //ɾ����ǰ�ļ��У�
        return rmdir( $dir );
    }



