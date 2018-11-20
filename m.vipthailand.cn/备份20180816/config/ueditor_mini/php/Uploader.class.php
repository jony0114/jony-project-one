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
        "�ļ���С���� upload_max_filesize ����" ,
        "�ļ���С���� MAX_FILE_SIZE ����" ,
        "�ļ�δ�������ϴ�" ,
        "û���ļ����ϴ�" ,
        "�ϴ��ļ�Ϊ��" ,
        "POST" => "�ļ���С���� post_max_size ����" ,
        "SIZE" => "�ļ���С������վ����" ,
        "TYPE" => "��������ļ�����" ,
        "DIR" => "Ŀ¼����ʧ��" ,
        "IO" => "�����������" ,
        "UNKNOWN" => "δ֪����" ,
        "MOVE" => "�ļ�����ʱ����",
        "DIR_ERROR" => "����Ŀ¼ʧ��"
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

        $folder = $this->getFolder();

        if ( $folder === false ) {
            $this->stateInfo = $this->getStateInfo( "DIR_ERROR" );
            return;
        }

        $this->fullName = $folder . '/' . $this->getName();

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