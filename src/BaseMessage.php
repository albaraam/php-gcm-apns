<?php
/**
 * Created by Albaraa Mishlawi
 * Date: 12/3/2015
 * Time: 4:28 PM
 */

namespace albaraam\gcmapns;


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
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
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
     * @return $this
     */
    public function setBody($body)
    {
        $this->body = $body;
        return $this;
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
     * @return $this
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
        return $this;
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
     * @return $this
     */
    public function setContentAvailable($contentAvailable)
    {
        $this->contentAvailable = $contentAvailable;
        return $this;
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
     * @return $this
     */
    public function setDryRun($dryRun)
    {
        $this->dryRun = $dryRun;
        return $this;
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
     * @return $this
     */
    public function setClickAction($clickAction)
    {
        $this->clickAction = $clickAction;
        return $this;
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
     * @return $this
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
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
     * @return $this
     */
    public function setTitleLocKey($titleLocKey)
    {
        $this->titleLocKey = $titleLocKey;
        return $this;
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
     * @return $this
     */
    public function setTitleLocArgs($titleLocArgs)
    {
        $this->titleLocArgs = $titleLocArgs;
        return $this;
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
     * @return $this
     */
    public function setBodyLocKey($bodyLocKey)
    {
        $this->bodyLocKey = $bodyLocKey;
        return $this;
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
     * @return $this
     */
    public function setBodyLocArgs($bodyLocArgs)
    {
        $this->bodyLocArgs = $bodyLocArgs;
        return $this;
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
     * @return $this
     */
    public function setSound($sound)
    {
        $this->sound = $sound;
        return $this;
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
     * @return $this
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }


}