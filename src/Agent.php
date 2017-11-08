<?php

namespace instantjay\horusphp;

class Agent {
    protected $agent;

    public function __construct() {
        $this->agent = new \Jenssegers\Agent\Agent();
    }

    /**
     * @return bool
     */
    public function isHuman() {
        return !$this->agent->isRobot();
    }

    /**
     * @return bool
     */
    public function isRobot() {
        return $this->agent->isRobot();
    }

    /**
     * @return bool
     */
    public function isPhone() {
        return $this->agent->isPhone();
    }

    /**
     * @return bool
     */
    public function isTablet() {
        return $this->agent->isTablet();
    }

    /**
     * @return bool
     */
    public function isDesktop() {
        return $this->agent->isDesktop();
    }

    /**
     * @return null|string
     */
    public function getUserAgent() {
        return $this->agent->getUserAgent();
    }
}