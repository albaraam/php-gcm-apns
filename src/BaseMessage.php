<?php
/**
 * Created by Albaraa Mishlawi
 * Date: 12/3/2015
 * Time: 4:28 PM
 */

namespace albaraam\gmcapns;


class BaseMessage
{
    /**
     * @var string
     */
    protected $title;
    /**
     * @var string
     */
    protected $body;
    /**
     * @var int 5 or 10
     */
    protected $priority;
    /**
     * @var bool
     */
    protected $contentAvailable;
    /**
     * @var bool
     */
    protected $dryRun;
    /**
     * @var string
     */
    protected $clickAction;
    /**
     * @var string
     */
    protected $category;
    /**
     * @var string
     */
    protected $titleLocKey;
    /**
     * @var string
     */
    protected $titleLocArgs;
    /**
     * @var string
     */
    protected $bodyLocKey;
    /**
     * @var string
     */
    protected $bodyLocArgs;
    /**
     * @var string
     */
    protected $sound;

    /**
     * @var array|null
     */
    protected $data;

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param string $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * @return int
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param int $priority
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
    }

    /**
     * @return boolean
     */
    public function isContentAvailable()
    {
        return $this->contentAvailable;
    }

    /**
     * @param boolean $contentAvailable
     */
    public function setContentAvailable($contentAvailable)
    {
        $this->contentAvailable = $contentAvailable;
    }

    /**
     * @return boolean
     */
    public function isDryRun()
    {
        return $this->dryRun;
    }

    /**
     * @param boolean $dryRun
     */
    public function setDryRun($dryRun)
    {
        $this->dryRun = $dryRun;
    }

    /**
     * @return string
     */
    public function getClickAction()
    {
        return $this->clickAction;
    }

    /**
     * @param string $clickAction
     */
    public function setClickAction($clickAction)
    {
        $this->clickAction = $clickAction;
    }

    /**
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param string $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return string
     */
    public function getTitleLocKey()
    {
        return $this->titleLocKey;
    }

    /**
     * @param string $titleLocKey
     */
    public function setTitleLocKey($titleLocKey)
    {
        $this->titleLocKey = $titleLocKey;
    }

    /**
     * @return string
     */
    public function getTitleLocArgs()
    {
        return $this->titleLocArgs;
    }

    /**
     * @param string $titleLocArgs
     */
    public function setTitleLocArgs($titleLocArgs)
    {
        $this->titleLocArgs = $titleLocArgs;
    }

    /**
     * @return string
     */
    public function getBodyLocKey()
    {
        return $this->bodyLocKey;
    }

    /**
     * @param string $bodyLocKey
     */
    public function setBodyLocKey($bodyLocKey)
    {
        $this->bodyLocKey = $bodyLocKey;
    }

    /**
     * @return string
     */
    public function getBodyLocArgs()
    {
        return $this->bodyLocArgs;
    }

    /**
     * @param string $bodyLocArgs
     */
    public function setBodyLocArgs($bodyLocArgs)
    {
        $this->bodyLocArgs = $bodyLocArgs;
    }

    /**
     * @return string
     */
    public function getSound()
    {
        return $this->sound;
    }

    /**
     * @param string $sound
     */
    public function setSound($sound)
    {
        $this->sound = $sound;
    }

    /**
     * @return array|null
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array|null $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }


}