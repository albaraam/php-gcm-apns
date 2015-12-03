<?php

namespace albaraam\gmcapns;

use albaraam\gcm\GCMClient;
use albaraam\gcm\GCMMessage;

/**
 * Client
 */
class Message extends BaseMessage
{
    public $android;
    public $ios;
    /**
     * Message constructor.
     */
    public function __construct($title,$body)
    {
        $this->android = new AndroidMessage();
        $this->ios = new IOSMessage();
        $this->setTitle($title);
        $this->setBody($body);
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
        $this->android->setTitle($title);
        $this->ios->setTitle($title);
    }
    /**
     * @param string $body
     */
    public function setBody($body)
    {
        $this->body = $body;
        $this->android->setBody($body);
        $this->ios->setBody($body);
    }
    /**
     * @param int $priority
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
        $this->android->setPriority($priority);
        $this->ios->setPriority($priority);
    }
    /**
     * @param boolean $contentAvailable
     */
    public function setContentAvailable($contentAvailable)
    {
        $this->contentAvailable = $contentAvailable;
        $this->android->setContentAvailable($contentAvailable);
        $this->ios->setContentAvailable($contentAvailable);
    }
    /**
     * @param boolean $dryRun
     */
    public function setDryRun($dryRun)
    {
        $this->dryRun = $dryRun;
        $this->android->setDryRun($dryRun);
        $this->ios->setDryRun($dryRun);
    }
    /**
     * @param string $clickAction
     */
    public function setClickAction($clickAction)
    {
        $this->clickAction = $clickAction;
        $this->android->setClickAction($clickAction);
        $this->ios->setCategory($clickAction);
    }
    /**
     * @param string $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
        $this->android->setClickAction($category);
        $this->ios->setCategory($category);
    }
    /**
     * @param string $titleLocKey
     */
    public function setTitleLocKey($titleLocKey)
    {
        $this->titleLocKey = $titleLocKey;
        $this->android->setTitleLocKey($titleLocKey);
        $this->ios->setTitleLocKey($titleLocKey);
    }
    /**
     * @param string $titleLocArgs
     */
    public function setTitleLocArgs($titleLocArgs)
    {
        $this->titleLocArgs = $titleLocArgs;
        $this->android->setTitleLocArgs($titleLocArgs);
        $this->ios->setTitleLocArgs($titleLocArgs);
    }
    /**
     * @param string $bodyLocKey
     */
    public function setBodyLocKey($bodyLocKey)
    {
        $this->bodyLocKey = $bodyLocKey;
        $this->android->setBodyLocKey($bodyLocKey);
        $this->ios->setBodyLocKey($bodyLocKey);
    }
    /**
     * @param string $bodyLocArgs
     */
    public function setBodyLocArgs($bodyLocArgs)
    {
        $this->bodyLocArgs = $bodyLocArgs;
        $this->android->setBodyLocArgs($bodyLocArgs);
        $this->ios->setBodyLocArgs($bodyLocArgs);
    }
    /**
     * @param string $sound
     */
    public function setSound($sound)
    {
        $this->sound = $sound;
        $this->android->setSound($sound);
        $this->ios->setSound($sound);
    }
    /**
     * @param array|null $data
     */
    public function setData($data)
    {
        $this->data = $data;
        $this->android->setData($data);
        $this->ios->setData($data);
    }

}

class AndroidMessage extends BaseMessage{

    private $to;
    private $icon;
    private $collapseKey;
    private $delayWhileIdle;
    private $timeToLive;
    private $restrictedPackageName;
    private $tag;
    private $color;

    /**
     * @return mixed
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param mixed $to
     */
    public function setTo($to)
    {
        $this->to = (is_array($to)) ? $to : [$to];
    }

    /**
     * @return mixed
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @param mixed $icon
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
    }

    /**
     * @return mixed
     */
    public function getCollapseKey()
    {
        return $this->collapseKey;
    }

    /**
     * @param mixed $collapseKey
     */
    public function setCollapseKey($collapseKey)
    {
        $this->collapseKey = $collapseKey;
    }

    /**
     * @return mixed
     */
    public function getDelayWhileIdle()
    {
        return $this->delayWhileIdle;
    }

    /**
     * @param mixed $delayWhileIdle
     */
    public function setDelayWhileIdle($delayWhileIdle)
    {
        $this->delayWhileIdle = $delayWhileIdle;
    }

    /**
     * @return mixed
     */
    public function getTimeToLive()
    {
        return $this->timeToLive;
    }

    /**
     * @param mixed $timeToLive
     */
    public function setTimeToLive($timeToLive)
    {
        $this->timeToLive = $timeToLive;
    }

    /**
     * @return mixed
     */
    public function getRestrictedPackageName()
    {
        return $this->restrictedPackageName;
    }

    /**
     * @param mixed $restrictedPackageName
     */
    public function setRestrictedPackageName($restrictedPackageName)
    {
        $this->restrictedPackageName = $restrictedPackageName;
    }

    /**
     * @return mixed
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @param mixed $tag
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param mixed $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    public function toArray(){

    }

}

class IOSMessage extends BaseMessage{

    private $to;
    private $launchImage;
    private $badge;

    /**
     * @return mixed
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param mixed $to
     */
    public function setTo($to)
    {
        $this->to = (is_array($to)) ? $to : [$to];
    }

    /**
     * @return mixed
     */
    public function getLaunchImage()
    {
        return $this->launchImage;
    }

    /**
     * @param mixed $launchImage
     */
    public function setLaunchImage($launchImage)
    {
        $this->launchImage = $launchImage;
    }

    /**
     * @return mixed
     */
    public function getBadge()
    {
        return $this->badge;
    }

    /**
     * @param mixed $badge
     */
    public function setBadge($badge)
    {
        $this->badge = $badge;
    }

    public function toArray(){

    }
}