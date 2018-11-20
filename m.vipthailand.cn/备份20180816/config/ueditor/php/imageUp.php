<?php
	

    /**
     * Created by JetBrains PhpStorm.
     * User: taoqili
     * Date: 12-7-18
     * Time: ����10:42
     */
    header("Content-Type: text/html; charset=gbk");
    error_reporting(E_ERROR | E_WARNING);
    date_default_timezone_set("Asia/chongqing");
    include "Uploader.class.php";
    //�ϴ�ͼƬ���е����������ƣ�
    $title = htmlspecialchars($_POST['pictitle'], ENT_QUOTES);
    $path = htmlspecialchars($_POST['dir'], ENT_QUOTES);
    $globalConfig = include( "config.php" );
    $imgSavePathConfig = $globalConfig[ 'imageSavePath' ];

    //��ȡ�洢Ŀ¼
    if ( isset( $_GET[ 'fetch' ] ) ) {

        header( 'Content-Type: text/javascript' );
        echo 'updateSavePath('. json_encode($imgSavePathConfig) .');';
        return;

    }

    //�ϴ�����
    $config = array(
        "savePath" => $imgSavePathConfig,
        "maxSize" => 1000, //��λKB
        "allowFiles" => array(".gif", ".png", ".jpg", ".jpeg", ".bmp")
    );

    if ( empty( $path ) ) {

        $path = $config[ 'savePath' ][ 0 ];

    }

    //�ϴ�Ŀ¼��֤
    if ( !in_array( $path, $config[ 'savePath' ] ) ) {
        //�Ƿ��ϴ�Ŀ¼
        echo '{"state":"\u975e\u6cd5\u4e0a\u4f20\u76ee\u5f55"}';
        return;
    }

    $config[ 'savePath' ] = $path . '/';

    //�����ϴ�ʵ����������ϴ�
    $up = new Uploader("upfile", $config);

    /**
     * �õ��ϴ��ļ�����Ӧ�ĸ�������,����ṹ
     * array(
     *     "originalName" => "",   //ԭʼ�ļ���
     *     "name" => "",           //���ļ���
     *     "url" => "",            //���صĵ�ַ
     *     "size" => "",           //�ļ���С
     *     "type" => "" ,          //�ļ�����
     *     "state" => ""           //�ϴ�״̬���ϴ��ɹ�ʱ���뷵��"SUCCESS"
     * )
     */
    $info = $up->getFileInfo();

    /**
     * ���������������json����
     * {
     *   'url'      :'a.jpg',   //�������ļ�·��
     *   'title'    :'hello',   //�ļ���������ͼƬ��˵��ǰ�˻���ӵ�title������
     *   'original' :'b.jpg',   //ԭʼ�ļ���
     *   'state'    :'SUCCESS'  //�ϴ�״̬���ɹ�ʱ����SUCCESS,�����κ�ֵ��ԭ��������ͼƬ�ϴ�����
     * }
     */
    echo "{'url':'" . $info["url"] . "','title':'" . $title . "','original':'" . $info["originalName"] . "','state':'" . $info["state"] . "'}";

