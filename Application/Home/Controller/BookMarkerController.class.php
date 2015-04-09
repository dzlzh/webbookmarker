<?php

namespace Home\Controller;
use Think\Controller;
require_once 'simple_html_dom.php';

/**
 * Class BookMarkerController
 * @author dzlzh
 */
class BookMarkerController extends Controller
{

    /**
     * index
     * @return void
     * @author dzlzh
     **/
    public function index()
    {
        echo "BookMarker";
    }

    private $msgTpl = '{"code": %s; "content": %s}';

    /**
     * CreateMsg
     * @return string
     * @author dzlzh
     **/
    private function CreateMsg($code, $content)
    {
        $result = sprintf($this -> msgTpl, $code, $content);
        return $result;
    }

    /**
     * FormatIcon
     * @return string
     * @author dzlzh
     **/
    private function FormatIcon($href, $iconUrl)
    { 
        if (!strstr($iconUrl, "http") && $iconUrl != null) {
            return $href . $iconUrl;
        } elseif ($iconUrl == null) {
            $iconUrl = "http://su.bdimg.com/icon/6000.png";
            return $iconUrl;
        } else {
            return $iconUrl;
        }
        
    }

    /**
     * GetMarker
     * @return array
     * @author dzlzh
     **/
    private function GetMarker($title, $url)
    { 
        if (!$html = file_get_html($url)) {
            return false;
        } else {
            if ($title == '') {
                $data['title'] = $html->find('title', 0)->plaintext;
            } else {
                $data['title'] = $title;
            }
            $data['href'] = $url;
            if ($icon = $html->find('link[rel=shortcut icon]', 0)->href) {
                $data['icon'] = $icon;
            } elseif ($icon = $html->find('link[rel=shortcut icon]', 0)->href) {
                $data['icon'] = $icon;
            }

        }
        return $data;
    }

    /**
     * Add
     * @return void
     * @author dzlzh
     **/
    public function Add($title, $url)
    {
        if ($data = $this->GetMarker($title, $url)) {
            $data['icon'] = $this->FormatIcon($data['href'], $data['icon']);
            $marker = D('Marker');
            $data['id'] = null;
            $marker->create($data);
            $marker->add($data);
            $data = json_encode($data);
            echo $this->CreateMsg(1, $data);
            
        } else {
            echo $this->CreateMsg(0, '"获取url失败"');
        }
        
    }

    /**
     * Del
     * @return void
     * @author dzlzh
     **/
    public function Del($id)
    {
        $marker = D('Marker');
        $condition['id'] = $id;
        if ($marker->where($conditon)->delete() != 0) {
            echo $this->CreateMsg(1, '"删除书签成功"');
        } else {
            echo $this->CreateMsg(0, '"删除书签失败"');
        }
        
    }

    /**
     * Search
     * @return void
     * @author dalzh
     **/
    public function Search($keyworld)
    {
        $marker = D('Marker');
        $condition['title'] = array('like', "%{keyworld}%"); 
        if ($data = $marker->where($condition)->select()) {
            $data = json_encode($data);
            echo $this->CreateMsg(1, $data);
        } else {
            echo $this->CreateMssg(0, '"没有找到相关信息"');
        }
        
    }

    /**
     * Alter
     * @return void
     * @author dzlzh
     **/
    public function Alter($id, $title, $href)
    {
        $marker = D('Marker');
        $data['id'] = $id;
        $data['title'] = $title;
        $data['href'] = $href;
        //print_r($data);
        $marker->create($data);
        $marker->save($data);
    }

    /**
     * ShowAll
     * @return void
     * @author dzlzh
     **/
    public function ShowAll()
    {
        $marker = D('Marker');
        echo json_encode($marker->select());
    }

}
