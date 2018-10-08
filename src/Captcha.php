<?php

namespace instantjay\horusphp;

use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use instantjay\horusphp\Model\Rgb;

class Captcha
{
    protected $captchaPhraseSessionKey;

    /**
     * Captcha constructor.
     * @param string $sessionKey
     */
    public function __construct($sessionKey = 'captcha_phrase') {
        $this->captchaPhraseSessionKey = $sessionKey;
    }

    /**
     * @param int $length
     * @param int $width
     * @param int $height
     * @param string[] $backgroundImageAbsolutePaths
     * @param Rgb $textColor
     * @return string
     */
    public function generateInlineCaptcha($length = 7, $width = 200, $height = 200, array $backgroundImageAbsolutePaths = [], Rgb $textColor = null)
    {
        //
        $phraseBuilder = new PhraseBuilder();
        $phrase = $phraseBuilder->build($length);

        //
        $builder = new CaptchaBuilder($phrase);

        //
        $builder->setBackgroundImages($backgroundImageAbsolutePaths);
        $builder->setIgnoreAllEffects(true);

        if ($textColor) {
            $builder->setTextColor(
                $textColor->getRed(),
                $textColor->getGreen(),
                $textColor->getBlue()
            );
        }

        $builder->setDistortion(true);

        //
        $builder->build($width, $height);

        //
        $_SESSION[$this->captchaPhraseSessionKey] = $builder->getPhrase();

        return $builder->inline();
    }

    /**
     * @param string $phrase
     * @return bool
     */
    public function testCaptchaPhrase($phrase)
    {
        $storedPhrase = (!empty($_SESSION[$this->captchaPhraseSessionKey]) ? $_SESSION[$this->captchaPhraseSessionKey] : null);

        if(!$storedPhrase)
            return false;

        $builder = new CaptchaBuilder($storedPhrase);

        return $builder->testPhrase($phrase);
    }
}
