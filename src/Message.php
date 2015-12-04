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
        return $this;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;
        $this->android->setTitle($title);
        $this->ios->setTitle($title);
        return $this;
    }

    /**
     * @param string $body
     * @return $this
     */
    public function setBody($body)
    {
        $this->body = $body;
        $this->android->setBody($body);
        $this->ios->setBody($body);
        return $this;
    }

    /**
     * @param int $priority
     * @return $this
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
        $this->android->setPriority($priority);
        $this->ios->setPriority($priority);
        return $this;
    }

    /**
     * @param boolean $contentAvailable
     * @return $this
     */
    public function setContentAvailable($contentAvailable)
    {
        $this->contentAvailable = $contentAvailable;
        $this->android->setContentAvailable($contentAvailable);
        $this->ios->setContentAvailable($contentAvailable);
        return $this;
    }

    /**
     * @param boolean $dryRun
     * @return $this
     */
    public function setDryRun($dryRun)
    {
        $this->dryRun = $dryRun;
        $this->android->setDryRun($dryRun);
        $this->ios->setDryRun($dryRun);
        return $this;
    }

    /**
     * @param string $clickAction
     * @return $this
     */
    public function setClickAction($clickAction)
    {
        $this->clickAction = $clickAction;
        $this->android->setClickAction($clickAction);
        $this->ios->setCategory($clickAction);
        return $this;
    }

    /**
     * @param string $category
     * @return $this
     */
    public function setCategory($category)
    {
        $this->category = $category;
        $this->android->setClickAction($category);
        $this->ios->setCategory($category);
        return $this;
    }

    /**
     * @param string $titleLocKey
     * @return $this
     */
    public function setTitleLocKey($titleLocKey)
    {
        $this->titleLocKey = $titleLocKey;
        $this->android->setTitleLocKey($titleLocKey);
        $this->ios->setTitleLocKey($titleLocKey);
        return $this;
    }

    /**
     * @param string $titleLocArgs
     * @return $this
     */
    public function setTitleLocArgs($titleLocArgs)
    {
        $this->titleLocArgs = $titleLocArgs;
        $this->android->setTitleLocArgs($titleLocArgs);
        $this->ios->setTitleLocArgs($titleLocArgs);
        return $this;
    }

    /**
     * @param string $bodyLocKey
     * @return $this
     */
    public function setBodyLocKey($bodyLocKey)
    {
        $this->bodyLocKey = $bodyLocKey;
        $this->android->setBodyLocKey($bodyLocKey);
        $this->ios->setBodyLocKey($bodyLocKey);
        return $this;
    }

    /**
     * @param string $bodyLocArgs
     * @return $this
     */
    public function setBodyLocArgs($bodyLocArgs)
    {
        $this->bodyLocArgs = $bodyLocArgs;
        $this->android->setBodyLocArgs($bodyLocArgs);
        $this->ios->setBodyLocArgs($bodyLocArgs);
        return $this;
    }

    /**
     * @param string $sound
     * @return $this
     */
    public function setSound($sound)
    {
        $this->sound = $sound;
        $this->android->setSound($sound);
        $this->ios->setSound($sound);
        return $this;
    }

    /**
     * @param array|null $data
     * @return $this
     */
    public function setData($data)
    {
        $this->data = $data;
        $this->android->setData($data);
        $this->ios->setData($data);
        return $this;
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
     * @return $this
     */
    public function setTo($to)
    {
        $this->to = (is_array($to)) ? $to : [$to];
        return $this;
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
     * @return $this
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
        return $this;
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
     * @return $this
     */
    public function setCollapseKey($collapseKey)
    {
        $this->collapseKey = $collapseKey;
        return $this;
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
     * @return $this
     */
    public function setDelayWhileIdle($delayWhileIdle)
    {
        $this->delayWhileIdle = $delayWhileIdle;
        return $this;
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
     * @return $this
     */
    public function setTimeToLive($timeToLive)
    {
        $this->timeToLive = $timeToLive;
        return $this;
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
     * @return $this
     */
    public function setRestrictedPackageName($restrictedPackageName)
    {
        $this->restrictedPackageName = $restrictedPackageName;
        return $this;
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
     * @return $this
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
        return $this;
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
     * @return $this
     */
    public function setColor($color)
    {
        $this->color = $color;
        return $this;
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
     * @return $this
     */
    public function setTo($to)
    {
        $this->to = (is_array($to)) ? $to : [$to];
        return $this;
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
     * @return $this
     */
    public function setLaunchImage($launchImage)
    {
        $this->launchImage = $launchImage;
        return $this;
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
     * @return $this
     */
    public function setBadge($badge)
    {
        $this->badge = $badge;
        return $this;
    }

}