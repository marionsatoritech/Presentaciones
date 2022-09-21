<?php

namespace App;

class mailObject{

    public String $to, $subject, $bodyText, $logoImage, $backgound, $border;

    public array $btnActions, $views;

    public function __construct()
    {
        
    }

    public static function withAttributes($to, $subject, $bodyText, $btnActions, $views, $logoImage)
    {
        $to = $to;
        $subject = $subject;
        $bodyText = $bodyText;
        $btnActions = $btnActions;
        $views = $views;
        $logoImage = $logoImage;
    }

    public function setTo(String $to){
        $this->to = $to;
    }

    public function setSubject(String $subject){
        $this->subject = $subject;
    }
    public function setBodyText(String $bodyText){
        $this->bodyText = $bodyText;
    }
    public function setBtnActions(array $btnActions){
        $this->btnActions = $btnActions;
    }
    public function setViews(array $views){
        $this->views = $views;
    }
    public function setLogoImage( $svgImage){
        $this->logoImage = $svgImage;
    }

    public function getTo(): String{
        return $this->to;
    }
    public function getSubject(): String{
        return $this->subject;
    }
    public function getBodyText(): String{
        return $this->bodyText;
    }
    public function getBtnActions(): array{
        return $this->btnActions;
    }
    public function getViews(): array{
        return $this->views;
    }

    public function getLogoImage(){
        return $this->logoImage;
    }
}