<?php
    /**
     * Created by JetBrains PhpStorm.
     * User: taoqili
     * Date: 11-12-28
     * Time: ����9:54
     * To change this template use File | Settings | File Templates.
     */
    header("Content-Type: text/html; charset=gbk");
    error_reporting(E_ERROR|E_WARNING);
    //Զ��ץȡͼƬ����
    $config = array(
        "savePath" => "upload/" ,            //����·��
        "allowFiles" => array( ".gif" , ".png" , ".jpg" , ".jpeg" , ".bmp" ) , //�ļ������ʽ
        "maxSize" => 3000                    //�ļ���С���ƣ���λKB
    );
    $uri = htmlspecialchars( $_POST[ 'upfile' ] );
    $uri = str_replace( "&amp;" , "&" , $uri );
    getRemoteImage( $uri,$config );

    /**
     * Զ��ץȡ
     * @param $uri
     * @param $config
     */
    function getRemoteImage( $uri,$config)
    {
        //����ץȡʱ������
        set_time_limit( 0 );
        //ue_separate_ue  ue���ڴ������ݷָ����
        $imgUrls = explode( "ue_separate_ue" , $uri );
        $tmpNames = array();
        foreach ( $imgUrls as $imgUrl ) {
            //http��ͷ��֤
            if(strpos($imgUrl,"http")!==0){
                array_push( $tmpNames , "error" );
                continue;
            }
            //��ȡ����ͷ
            $heads = get_headers( $imgUrl );
            //�������
            if ( !( stristr( $heads[ 0 ] , "200" ) && stristr( $heads[ 0 ] , "OK" ) ) ) {
                array_push( $tmpNames , "error" );
                continue;
            }

            //��ʽ��֤(��չ����֤��Content-Type��֤)
            $fileType = strtolower( strrchr( $imgUrl , '.' ) );
            if ( !in_array( $fileType , $config[ 'allowFiles' ] ) || stristr( $heads[ 'Content-Type' ] , "image" ) ) {
                array_push( $tmpNames , "error" );
                continue;
            }

            //���������������ȡԶ��ͼƬ
            ob_start();
            $context = stream_context_create(
                array (
                    'http' => array (
                        'follow_location' => false // don't follow redirects
                    )
                )
            );
            //��ȷ��php.ini�е�fopen wrappers�Ѿ�����
            readfile( $imgUrl,false,$context);
            $img = ob_get_contents();
            ob_end_clean();

            //��С��֤
            $uriSize = strlen( $img ); //�õ�ͼƬ��С
            $allowSize = 1024 * $config[ 'maxSize' ];
            if ( $uriSize > $allowSize ) {
                array_push( $tmpNames , "error" );
                continue;
            }
            //��������λ��
            $savePath = $config[ 'savePath' ];
            if ( !file_exists( $savePath ) ) {
                mkdir( "$savePath" , 0777 );
            }
            //д���ļ�
            $tmpName = $savePath . rand( 1 , 10000 ) . time() . strrchr( $imgUrl , '.' );
            try {
                $fp2 = @fopen( $tmpName , "a" );
                fwrite( $fp2 , $img );
                fclose( $fp2 );
                array_push( $tmpNames ,  $tmpName );
            } catch ( Exception $e ) {
                array_push( $tmpNames , "error" );
            }
        }
        /**
         * �������ݸ�ʽ
         * {
         *   'url'   : '�µ�ַһue_separate_ue�µ�ַ��ue_separate_ue�µ�ַ��',
         *   'srcUrl': 'ԭʼ��ַһue_separate_ueԭʼ��ַ��ue_separate_ueԭʼ��ַ��'��
         *   'tip'   : '״̬��ʾ'
         * }
         */
        echo "{'url':'" . implode( "ue_separate_ue" , $tmpNames ) . "','tip':'Զ��ͼƬץȡ�ɹ���','srcUrl':'" . $uri . "'}";
    }