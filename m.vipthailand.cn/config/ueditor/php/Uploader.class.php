<?php
/**
 * Created by JetBrains PhpStorm.
 * User: taoqili
 * Date: 12-7-18
 * Time: ����11: 32
 * UEditor�༭��ͨ���ϴ���
 */
class Uploader
{
    private $fileField;            //�ļ�����
    private $file;                 //�ļ��ϴ�����
    private $config;               //������Ϣ
    private $oriName;              //ԭʼ�ļ���
    private $fileName;             //���ļ���
    private $fullName;             //�����ļ���,���ӵ�ǰ����Ŀ¼��ʼ��URL
    private $fileSize;             //�ļ���С
    private $fileType;             //�ļ�����
    private $stateInfo;            //�ϴ�״̬��Ϣ,
    private $stateMap = array(    //�ϴ�״̬ӳ������ʻ��û��迼�Ǵ˴����ݵĹ��ʻ�
        "SUCCESS" ,                //�ϴ��ɹ���ǣ���UEditor���ڲ��ɸı䣬����flash�жϻ����
        // "�ļ���С���� upload_max_filesize ����" ,
        '\u6587\u4ef6\u5927\u5c0f\u8d85\u51fa\u9650\u5236',
        // "�ļ���С���� MAX_FILE_SIZE ����" ,
        '\u6587\u4ef6\u5927\u5c0f\u8d85\u51fa\u9650\u5236',
        // "�ļ�δ�������ϴ�" ,
        '\u6587\u4ef6\u672a\u88ab\u5b8c\u6574\u4e0a\u4f20',
        // "û���ļ����ϴ�" ,
        '\u6ca1\u6709\u6587\u4ef6\u88ab\u4e0a\u4f20',
        // "�ϴ��ļ�Ϊ��" ,
        '\u4e0a\u4f20\u6587\u4ef6\u4e3a\u7a7a',
//        "POST" => "�ļ���С���� post_max_size ����" ,
        'POST' => '\u6587\u4ef6\u5927\u5c0f\u8d85\u51fa\u9650\u5236',
        // "SIZE" => "�ļ���С������վ����" ,
        'SIZE' => '\u6587\u4ef6\u5927\u5c0f\u8d85\u51fa\u7f51\u7ad9\u9650\u5236',
        // "TYPE" => "��������ļ�����" ,
        'TYPE' => '\u4e0d\u5141\u8bb8\u7684\u6587\u4ef6\u7c7b\u578b',
        // "DIR" => "Ŀ¼����ʧ��" ,
        'DIR' => '\u76ee\u5f55\u521b\u5efa\u5931\u8d25',
        // "IO" => "�����������" ,
        'IO' => '\u8f93\u5165\u8f93\u51fa\u9519\u8bef',
        //"UNKNOWN" => "δ֪����" ,
        'UNKNOWN'=>'\u672a\u77e5\u9519\u8bef',
        // "MOVE" => "�ļ�����ʱ����"
        'MOVE' => '\u6587\u4ef6\u4fdd\u5b58\u65f6\u51fa\u9519'
    );

    /**
     * ���캯��
     * @param string $fileField ������
     * @param array $config  ������
     * @param bool $base64  �Ƿ����base64���룬��ʡ�ԡ�����������$fileField�������base64������ַ�������
     */
    public function __construct( $fileField , $config , $base64 = false )
    {
        $this->fileField = $fileField;
        $this->config = $config;
        $this->stateInfo = $this->stateMap[ 0 ];
        $this->upFile( $base64 );
    }

    /**
     * �ϴ��ļ�����������
     * @param $base64
     * @return mixed
     */
    private function upFile( $base64 )
    {
        //����base64�ϴ�
        if ( "base64" == $base64 ) {
            $content = $_POST[ $this->fileField ];
            $this->base64ToImage( $content );
            return;
        }

        //������ͨ�ϴ�
        $file = $this->file = $_FILES[ $this->fileField ];
        if ( !$file ) {
            $this->stateInfo = $this->getStateInfo( 'POST' );
            return;
        }
        if ( $this->file[ 'error' ] ) {
            $this->stateInfo = $this->getStateInfo( $file[ 'error' ] );
            return;
        }
        if ( !is_uploaded_file( $file[ 'tmp_name' ] ) ) {
            $this->stateInfo = $this->getStateInfo( "UNKNOWN" );
            return;
        }

        $this->oriName = $file[ 'name' ];
        $this->fileSize = $file[ 'size' ];
        $this->fileType = $this->getFileExt();

        if ( !$this->checkSize() ) {
            $this->stateInfo = $this->getStateInfo( "SIZE" );
            return;
        }
        if ( !$this->checkType() ) {
            $this->stateInfo = $this->getStateInfo( "TYPE" );
            return;
        }
        $this->fullName = $this->getFolder() . '/' . $this->getName();
        if ( $this->stateInfo == $this->stateMap[ 0 ] ) {
            if ( !move_uploaded_file( $file[ "tmp_name" ] , $this->fullName ) ) {
                $this->stateInfo = $this->getStateInfo( "MOVE" );
            }
        }
    }

    /**
     * ����base64�����ͼƬ�ϴ�
     * @param $base64Data
     * @return mixed
     */
    private function base64ToImage( $base64Data )
    {
        $img = base64_decode( $base64Data );
        $this->fileName = time() . rand( 1 , 10000 ) . ".png";
        $this->fullName = $this->getFolder() . '/' . $this->fileName;
        if ( !file_put_contents( $this->fullName , $img ) ) {
            $this->stateInfo = $this->getStateInfo( "IO" );
            return;
        }
        $this->oriName = "";
        $this->fileSize = strlen( $img );
        $this->fileType = ".png";
    }

    /**
     * ��ȡ��ǰ�ϴ��ɹ��ļ��ĸ�����Ϣ
     * @return array
     */
    public function getFileInfo()
    {
        return array(
            "originalName" => $this->oriName ,
            "name" => $this->fileName ,
            "url" => $this->fullName ,
            "size" => $this->fileSize ,
            "type" => $this->fileType ,
            "state" => $this->stateInfo
        );
    }

    /**
     * �ϴ�������
     * @param $errCode
     * @return string
     */
    private function getStateInfo( $errCode )
    {
        return !$this->stateMap[ $errCode ] ? $this->stateMap[ "UNKNOWN" ] : $this->stateMap[ $errCode ];
    }

    /**
     * �������ļ�
     * @return string
     */
    private function getName()
    {
        return $this->fileName = time() . rand( 1 , 10000 ) . $this->getFileExt();
    }

    /**
     * �ļ����ͼ��
     * @return bool
     */
    private function checkType()
    {
        return in_array( $this->getFileExt() , $this->config[ "allowFiles" ] );
    }

    /**
     * �ļ���С���
     * @return bool
     */
    private function  checkSize()
    {
        return $this->fileSize <= ( $this->config[ "maxSize" ] * 1024 );
    }

    /**
     * ��ȡ�ļ���չ��
     * @return string
     */
    private function getFileExt()
    {
        return strtolower( strrchr( $this->file[ "name" ] , '.' ) );
    }

    /**
     * ���������Զ������洢�ļ���
     * @return string
     */
    private function getFolder()
    {
        $pathStr = $this->config[ "savePath" ];
        if ( strrchr( $pathStr , "/" ) != "/" ) {
            $pathStr .= "/";
        }
        $pathStr .= date( "Ymd" );
        if ( !file_exists( $pathStr ) ) {
            if ( !mkdir( $pathStr , 0777 , true ) ) {
                return false;
            }
        }
        return $pathStr;
    }
}