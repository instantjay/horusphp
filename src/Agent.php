<?php

namespace instantjay\horusphp;

use Symfony\Component\HttpFoundation\Request;

class Agent {
    protected $agent;

    public function __construct(Request $request = null) {
        $headers = $request ? $request->headers->all() : null;

        $this->agent = new \Jenssegers\Agent\Agent($headers);
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