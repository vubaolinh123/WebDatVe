<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login WEBANVE</title>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png"
        href="https://cdn2.iconfinder.com/data/icons/internet-marketing-dazzle-vol-2/256/Meta_Description-512.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link href="https://www.cssscript.com/demo/sticky.css" rel="stylesheet" type="text/css">
    <style>
        html,
        body,
        #buttons {
            width: 100%;
            overflow-x: hidden;
            color: #555;
        }

        body {
            background: #fafafa;
        }

        .intro {
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            color: #333;
            margin-top: 150px;
        }

        .intro h1 {
            font-size: 5rem;
        }

        #buttons h2 {
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
        }

        .btn-box {
            margin: auto;
            max-width: 800px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .buttons-section {
            margin-top: 80px;
        }

        .btn-container {
            height: 80px;
            width: 230px;
            margin: auto;
            position: relative;
            z-index: 0;
        }

        .btn {
            display: block;
            margin: auto;
            font-family: Arial, Helvetica, sans-serif;
            text-transform: uppercase;
            position: relative;
            cursor: pointer;
        }

        /* Slide from bottom */
        .btn-slide-bottom {
            border: none;
            display: block;
            text-align: center;
            cursor: pointer;
            overflow: hidden;
            color: #fff !important;
            font-weight: 700;
            font-size: 15px;
            background-color: #333;
            padding: 17px 45px;
            transition: all .5s ease-in-out;
        }

        .btn-slide-bottom span {
            position: relative;
            z-index: 1;
        }

        .btn-slide-bottom:after {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            height: 490%;
            width: 140%;
            -webkit-transition: all .5s ease-in-out;
            transition: all .5s ease-in-out;
            -webkit-transform: translateX(-98%) translateY(-25%) rotate(45deg);
            transform: translateX(-98%) translateY(-25%) rotate(45deg);
        }

        .btn-slide-bottom:hover:after {
            -webkit-transform: translateX(-9%) translateY(-25%) rotate(45deg);
            transform: translateX(-9%) translateY(-25%) rotate(45deg);
        }

        .btn-slide-bottom--orange:after {
            background: #FEAE00;
        }

        .btn-slide-bottom--pink:after {
            background: #FF6392;
        }

        .btn-slide-bottom--blue:after {
            background: #3A86FF;
        }

        .btn-slide-bottom--red:after {
            background: #EF233C;
        }

        .btn-slide-bottom--green:after {
            background: #80ED99;
        }

        .btn-slide-bottom--yellow:after {
            background: #3D348B;
        }

        /* Subtle moving gradient with shadow */
        .btn-moving-gradient {
            height: 55px;
            width: 200px;
            font-size: 16px;
            font-weight: 600;
            color: #fff;
            cursor: pointer;
            border: none;
            background-size: 300% 100%;
            border-radius: 50px;
            -moz-transition: all .5s ease-in-out;
            -o-transition: all .5s ease-in-out;
            -webkit-transition: all .5s ease-in-out;
            transition: all .5s ease-in-out;
        }

        .btn-moving-gradient:hover {
            background-position: 100% 0;
            -moz-transition: all .5s ease-in-out;
            -o-transition: all .5s ease-in-out;
            -webkit-transition: all .5s ease-in-out;
            transition: all .5s ease-in-out;
        }

        .btn-moving-gradient--orange {
            background-image: linear-gradient(to right, hsl(31, 100%, 50%), hsl(45, 100%, 50%), hsl(41, 100%, 50%), #FBB03B);
            box-shadow: 0 4px 15px 0 hsl(45, 100%, 40%);
        }

        .btn-moving-gradient--pink {
            background-image: linear-gradient(to right, hsl(332, 100%, 69%), hsl(390, 100%, 69%), hsl(360, 100%, 69%), #FF6392);
            box-shadow: 0 4px 15px 0 hsl(370, 100%, 69%);
        }

        .btn-moving-gradient--blue {
            background-image: linear-gradient(to right, hsl(217, 100%, 62%), hsl(280, 100%, 62%), hsl(260, 100%, 62%), #3A86FF);
            box-shadow: 0 4px 15px 0 hsl(280, 100%, 62%);
        }

        .btn-moving-gradient--red {
            background-image: linear-gradient(to right, hsl(353, 86%, 54%), hsl(393, 86%, 54%), hsl(380, 86%, 54%), #EF233C);
            box-shadow: 0 4px 15px 0 hsl(393, 86%, 54%);
        }

        .btn-moving-gradient--green {
            background-image: linear-gradient(to right, hsl(134, 75%, 72%), hsl(184, 75%, 72%), hsl(154, 75%, 72%), #80ED99);
            box-shadow: 0 4px 15px 0 hsl(184, 75%, 72%);
        }

        .btn-moving-gradient--purple {
            background-image: linear-gradient(to right, hsl(246, 45%, 38%), hsl(296, 45%, 38%), hsl(276, 45%, 38%), #3D348B);
            box-shadow: 0 4px 15px 0 hsl(296, 45%, 38%);
        }

        /* Rectangular to rounded */
        .btn-rect-to-round {
            height: 55px;
            width: 200px;
            font-size: 16px;
            font-weight: 600;
            background: transparent;
            cursor: pointer;
            -moz-transition: all .5s ease-in;
            -o-transition: all .5s ease-in-out;
            -webkit-transition: all .5s ease-in;
            transition: all .5s ease-in;
        }

        .btn-rect-to-round:hover {
            border-radius: 60px;
            color: #fff !important;
        }

        .btn-rect-to-round--black {
            color: #333 !important;
            border: 2px solid #333;
        }

        .btn-rect-to-round--black:hover {
            border-color: #333;
            background: #333;
        }

        .btn-rect-to-round--pink {
            color: #FF6392 !important;
            border: 2px solid #FF6392;
        }

        .btn-rect-to-round--pink:hover {
            border-color: #FF6392;
            background: #FF6392;
        }

        .btn-rect-to-round--blue {
            color: #3A86FF !important;
            border: 2px solid #3A86FF;
        }

        .btn-rect-to-round--blue:hover {
            border-color: #3A86FF;
            background: #3A86FF;
        }

        .btn-rect-to-round--red {
            color: #EF233C !important;
            border: 2px solid #EF233C;
        }

        .btn-rect-to-round--red:hover {
            border-color: #EF233C;
            background: #EF233C;
        }

        .btn-rect-to-round--green {
            color: #80ED99 !important;
            border: 2px solid #80ED99;
        }

        .btn-rect-to-round--green:hover {
            border-color: #80ED99;
            background: #80ED99;
        }

        .btn-rect-to-round--orange {
            color: #FEAE00 !important;
            border: 2px solid #FEAE00;
        }

        .btn-rect-to-round--orange:hover {
            border-color: #FEAE00;
            background: #FEAE00;
        }

        /* Slide and show more text */
        .btn-slide-show {
            background: #333;
            width: 200px;
            height: 50px;
            overflow: hidden;
            text-align: center;
            transition: .4s;
            cursor: pointer;
            border-radius: 3px;
            font-weight: bold;
        }

        .btn-slide-show-inner {
            position: relative;
            width: 200px;
            height: 100px;
            margin-top: -100px;
            padding-top: 2px;
            left: -250px;
            transition: .5s;
        }

        .btn-slide-show-text1 {
            color: #fff;
            font-weight: bold;
            margin-top: 15px;
            transition: all .5s ease-in-out;
        }

        .btn-slide-show-text2 {
            margin-top: 65px;
            margin-right: -130px;
            color: #FFF;
            font-weight: bold;
        }

        .btn-slide-show:hover .btn-slide-show-inner {
            left: -130px;
        }

        .btn:hover .btn-slide-show-text1 {
            margin-left: 65px;
        }

        .btn-slide-show-inner--orange {
            background: #FEAE00;
        }

        .btn-slide-show-inner--pink {
            background: #FF6392;
        }

        .btn-slide-show-inner--blue {
            background: #3A86FF;
        }

        .btn-slide-show-inner--red {
            background: #EF233C;
        }

        .btn-slide-show-inner--green {
            background: #80ED99;
        }

        .btn-slide-show-inner--gray {
            background: #eee;
        }

        /* Fill center */
        .btn-fill-center {
            text-align: center;
            cursor: pointer;
            text-transform: uppercase;
            font-weight: bold;
            transition: all .5s ease-in;
        }

        .btn-fill-center-text {
            display: block;
            max-width: 160px;
            text-decoration: none;
            border-radius: 4px;
            padding: 13px 50px;
            -webkit-transition: all 800ms cubic-bezier(0.390, 0.500, 0.150, 1.360);
            -moz-transition: all 800ms cubic-bezier(0.390, 0.500, 0.150, 1.360);
            -ms-transition: all 800ms cubic-bezier(0.390, 0.500, 0.150, 1.360);
            -o-transition: all 800ms cubic-bezier(0.390, 0.500, 0.150, 1.360);
            transition: all 800ms cubic-bezier(0.390, 0.500, 0.150, 1.360);
        }

        .btn-fill-center-text--gray {
            color: #333;
            border: 2px solid #333;
        }

        .btn-fill-center-text--gray:hover {
            color: #fff;
            box-shadow: #333 0 0px 0px 40px inset;
        }

        .btn-fill-center-text--orange {
            color: #FEAE00;
            border: 2px solid #FEAE00;
        }

        .btn-fill-center-text--orange:hover {
            color: #fff;
            box-shadow: #FEAE00 0 0px 0px 40px inset;
        }

        .btn-fill-center-text--blue {
            color: #3A86FF;
            border: 2px solid #3A86FF;
        }

        .btn-fill-center-text--blue:hover {
            color: #fff;
            box-shadow: #3A86FF 0 0px 0px 40px inset;
        }

        .btn-fill-center-text--purple {
            color: #3D348B;
            border: 2px solid #3D348B;
        }

        .btn-fill-center-text--purple:hover {
            color: #fff;
            box-shadow: #3D348B 0 0px 0px 40px inset;
        }

        .btn-fill-center-text--red {
            color: #EF233C;
            border: 2px solid #EF233C;
        }

        .btn-fill-center-text--red:hover {
            color: #fff;
            box-shadow: #EF233C 0 0px 0px 40px inset;
        }

        .btn-fill-center-text--green {
            color: #80ED99;
            border: 2px solid #80ED99;
        }

        .btn-fill-center-text--green:hover {
            color: #fff;
            box-shadow: #80ED99 0 0px 0px 40px inset;
        }

        /* Border to line */
        .btn-border-to-line {
            transition-property: all;
            transition-duration: .6s;
            transition-timing-function: ease;
        }

        .btn-border-to-line-text {
            cursor: pointer;
            font-size: 16px;
            text-transform: uppercase;
            width: 200px;
            position: relative;
            padding: 10px;
            padding-top: 15px;
            padding-left: 60px;
            padding-right: 60px;
            text-decoration: none;
            transition: all .6s ease-in;
            background: transparent;
            outline: none;
            border: 0;
        }

        .btn-border-to-line-text:hover {
            font-weight: bold;
        }

        .btn-border-to-line-text svg {
            height: 50px;
            left: 0;
            position: absolute;
            top: 0;
            width: 100%;
        }

        .btn-border-to-line-text rect {
            fill: none;
            stroke-width: 4;
            stroke-dasharray: 412, 0;
            transition: all 0.5s linear;
        }

        .btn-border-to-line-text:hover rect {
            stroke-width: 5;
            stroke-dasharray: 23, 365;
            stroke-dashoffset: 58;
            transition: all 1.9s cubic-bezier(0.19, 1, 0.22, 1);
        }

        .btn-border-to-line-text--gray {
            color: #333;
        }

        .btn-border-to-line-text--gray rect {
            stroke: #333;
        }

        .btn-border-to-line-text--orange {
            color: #FEAE00;
        }

        .btn-border-to-line-text--orange rect {
            stroke: #FEAE00;
        }

        .btn-border-to-line-text--blue {
            color: #3A86FF;
        }

        .btn-border-to-line-text--blue rect {
            stroke: #3A86FF;
        }

        .btn-border-to-line-text--red {
            color: #EF233C;
        }

        .btn-border-to-line-text--red rect {
            stroke: #EF233C;
        }

        .btn-border-to-line-text--green {
            color: #80ED99;
        }

        .btn-border-to-line-text--green rect {
            stroke: #80ED99;
        }

        .btn-border-to-line-text--purple {
            color: #3D348B;
        }

        .btn-border-to-line-text--purple rect {
            stroke: #3D348B;
        }

        /* Text strength */
        .btn-text-stretch {
            letter-spacing: 0;
            box-sizing: inherit;
            transition-property: all;
            transition-duration: .6s;
            transition-timing-function: ease;
            cursor: pointer;
            font-size: 16px;
            font-weight: 400;
            line-height: 45px;
            margin: 0 0 2em;
            max-width: 160px;
            position: relative;
            text-decoration: none;
            text-transform: uppercase;
            width: 100%;
            text-align: center;
            padding-left: 10px;
            padding-right: 10px;
            font-family: "lato", serif;
        }

        .btn-text-stretch:hover,
        .btn-text-stretch:active {
            letter-spacing: 5px;
        }

        .btn-text-stretch:after,
        .btn-text-stretch:before {
            backface-visibility: hidden;
            border: 1.5px solid transparent;
            bottom: 0px;
            content: " ";
            display: block;
            margin: 0 auto;
            position: relative;
            transition: all 400ms ease-in-out;
            width: 0;
        }

        .btn-text-stretch:hover:after,
        .btn-text-stretch:hover:before {
            backface-visibility: hidden;
            transition: width 500ms ease-in-out;
            width: 70%;
        }

        .btn-text-stretch:hover:before {
            bottom: auto;
            top: 0;
            width: 70%;
        }

        .btn-text-stretch--gray {
            color: #333
        }

        .btn-text-stretch--gray:hover:after,
        .btn-text-stretch--gray:hover:before {
            border-color: #333;
        }

        .btn-text-stretch--red {
            color: #EF233C;
        }

        .btn-text-stretch--red:hover:after,
        .btn-text-stretch--red:hover:before {
            border-color: #EF233C;
        }

        .btn-text-stretch--orange {
            color: #FEAE00;
        }

        .btn-text-stretch--orange:hover:after,
        .btn-text-stretch--orange:hover:before {
            border-color: #FEAE00;
        }

        .btn-text-stretch--blue {
            color: #3A86FF;
        }

        .btn-text-stretch--blue:hover:after,
        .btn-text-stretch--blue:hover:before {
            border-color: #3A86FF;
        }

        .btn-text-stretch--green {
            color: #80ED99;
        }

        .btn-text-stretch--green:hover:after,
        .btn-text-stretch--green:hover:before {
            border-color: #80ED99;
        }

        .btn-text-stretch--pink {
            color: #FF6392;
        }

        .btn-text-stretch--pink:hover:after,
        .btn-text-stretch--pink:hover:before {
            border-color: #FF6392;
        }

        /* Shine effect */
        .btn-shine-effect {
            box-sizing: inherit;
            transition-property: all;
            transition-duration: .6s;
            transition-timing-function: ease;
            overflow: hidden;
            position: relative;
            cursor: pointer;
            font-size: 16px;
            font-weight: 400;
            line-height: 45px;
            margin: 0 0 2em;
            max-width: 180px;
            position: relative;
            width: 100%;
            background: #f9f9f9;
        }

        .btn-shine-effect span {
            z-index: 20;
        }

        .btn-shine-effect-span:after {
            background: #fff;
            content: "";
            height: 155px;
            left: -75px;
            opacity: .8;
            position: absolute;
            top: -50px;
            transform: rotate(35deg);
            transition: all 550ms cubic-bezier(0.19, 1, 0.22, 1);
            width: 50px;
            z-index: 19;
        }

        .btn-shine-effect:hover .btn-shine-effect-span:after {
            left: 120%;
            transition: all 550ms cubic-bezier(0.19, 1, 0.22, 1);
        }

        .btn-shine-effect--gray {
            color: #333;
            border: 2px solid #333;
        }

        .btn-shine-effect--orange {
            color: #FEAE00;
            border: 2px solid #FEAE00;
        }

        .btn-shine-effect--red {
            color: #EF233C;
            border: 2px solid #EF233C;
        }

        .btn-shine-effect--blue {
            color: #3A86FF;
            border: 2px solid #3A86FF;
        }

        .btn-shine-effect--green {
            color: #80ED99;
            border: 2px solid #80ED99;
        }

        .btn-shine-effect--purple {
            color: #3D348B;
            border: 2px solid #3D348B;
        }

        /* Swipe right */
        .btn-swipe-left {
            display: block;
            overflow: hidden;
            text-align: center;
            max-width: 180px;
            padding: 10px;
            margin: auto;
            text-transform: uppercase;
            text-decoration: none;
            transition: all 0.5s ease-in-out;
            font-family: "lato", serif;
        }

        .btn-swipe-left:before {
            content: '';
            transform: translateX(-150%);
            -webkit-transform: translateX(-150%);
            position: absolute;
            left: 0;
            top: 0;
            height: 140%;
            width: 240%;
            -webkit-transition: all .5s ease-in-out;
            transition: all .5s ease-in-out;
        }

        .btn-swipe-left span {
            z-index: 2;
            position: relative;
            transition: all 0.5s ease-in-out;
        }

        .btn-swipe-left:hover span {
            color: #fff;
        }

        .btn-swipe-left:hover:before {
            transform: translateX(-50%);
            -webkit-transform: translateX(-50%);
        }

        .btn-swipe-left--black {
            color: #333;
            border: 2px solid #333;
        }

        .btn-swipe-left--black:before {
            background-color: #333;
        }

        .btn-swipe-left--orange {
            color: #FEAE00;
            border: 2px solid #FEAE00;
        }

        .btn-swipe-left--orange:before {
            background-color: #FEAE00;
        }

        .btn-swipe-left--red {
            color: #EF233C;
            border: 2px solid #EF233C;
        }

        .btn-swipe-left--red:before {
            background-color: #EF233C;
        }

        .btn-swipe-left--blue {
            color: #3A86FF;
            border: 2px solid #3A86FF;
        }

        .btn-swipe-left--blue:before {
            background-color: #3A86FF;
        }

        .btn-swipe-left--green {
            color: #80ED99;
            border: 2px solid #80ED99;
        }

        .btn-swipe-left--green:before {
            background-color: #80ED99;
        }

        .btn-swipe-left--purple {
            color: #3D348B;
            border: 2px solid #3D348B;
        }

        .btn-swipe-left--purple:before {
            background-color: #3D348B;
        }

        /* Double swipe */
        .btn-double-swipe {
            display: block;
            overflow: hidden;
            text-align: center;
            padding: 10px 20px;
            margin: auto;
            text-transform: uppercase;
            text-decoration: none;
            transition: all 0.5s ease-in-out;
            max-width: 150px;
        }

        .btn-double-swipe:before,
        .btn-double-swipe:after {
            content: "";
            position: absolute;
            height: 490%;
            top: 0;
            width: 120%;
            -webkit-transition: all .5s ease-in-out;
            transition: all .5s ease-in-out;
            -webkit-transform: translateX(-98%) translateY(-25%) rotate(45deg);
            transform: translateX(-98%) translateY(-25%) rotate(45deg);
        }

        .btn-double-swipe:before {
            right: -50px;
            border-right: 50px solid transparent;
            transform: translateX(-100%);
            -webkit-transform: translateX(-100%);
        }

        .btn-double-swipe:after {
            left: -50px;
            border-left: 50px solid transparent;
            transform: translateX(100%);
            -webkit-transform: translateX(100%);
        }

        .btn-double-swipe span {
            position: relative;
            transition: all 0.5s ease-in-out;
            z-index: 4;
        }

        .btn-double-swipe:hover span {
            opacity: 0.9;
            color: #fff;
        }

        .btn-double-swipe:hover:before {
            transform: translateX(-40%);
        }

        .btn-double-swipe:hover:after {
            transform: translateX(40%);
        }

        .btn-double-swipe--black {
            color: #333;
            border: 2px solid #333;
        }

        .btn-double-swipe--black:before,
        .btn-double-swipe--black:after {
            background: #333 !important;
        }

        .btn-double-swipe--orange {
            border: 2px solid #FEAE00;
            color: #FEAE00;
        }

        .btn-double-swipe--orange:before,
        .btn-double-swipe--orange:after {
            background: #FEAE00;
        }

        .btn-double-swipe--red {
            border: 2px solid #EF233C;
            color: #EF233C;
        }

        .btn-double-swipe--red:before,
        .btn-double-swipe--red:after {
            background: #EF233C;
        }

        .btn-double-swipe--blue {
            border: 2px solid #3A86FF;
            color: #3A86FF;
        }

        .btn-double-swipe--blue:before,
        .btn-double-swipe--blue:after {
            background: #3A86FF;
        }

        .btn-double-swipe--green {
            border: 2px solid #80ED99;
            color: #80ED99;
        }

        .btn-double-swipe--green:before,
        .btn-double-swipe--green:after {
            background: #80ED99;
        }

        .btn-double-swipe--purple {
            border: 2px solid #3D348B;
            color: #3D348B;
        }

        .btn-double-swipe--purple:before,
        .btn-double-swipe--purple:after {
            background: #3D348B;
        }

        /* Diagonal half swipe */
        .btn-half-swipe {
            display: block;
            overflow: hidden;
            padding: 10px;
            width: 180px;
            text-align: center;
            margin: auto;
            text-transform: uppercase;
            border: 2px solid #333;
            color: #333;
            text-decoration: none;
            transition: all 0.5s ease-in-out;
        }

        .btn-half-swipe:before,
        .btn-half-swipe:after {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 140%;
            -webkit-transition: all .5s ease-in-out;
            transition: all .5s ease-in-out;
        }

        .btn-half-swipe span {
            position: relative;
            transition: all 0.5s ease-in-out;
            z-index: 4;
        }

        .btn-half-swipe:after {
            left: -70px;
            border-left: 50px solid transparent;
            transform: translateX(100%);
        }

        .btn-half-swipe:hover:before {
            transform: translateX(-49%);
        }

        .btn-half-swipe:hover:after {
            transform: translateX(49%);
        }

        .btn-half-swipe--orange:after {
            border-top: 80px solid #FEAE00;
        }

        .btn-half-swipe--orange:hover {
            border: 2px solid #FEAE00;
        }

        .btn-half-swipe--pink:after {
            border-top: 80px solid #FF6392;
        }

        .btn-half-swipe--pink:hover {
            border: 2px solid #FF6392;
        }

        .btn-half-swipe--red:after {
            border-top: 80px solid #EF233C;
        }

        .btn-half-swipe--red:hover {
            border: 2px solid #EF233C;
        }

        .btn-half-swipe--blue:after {
            border-top: 80px solid #3A86FF;
        }

        .btn-half-swipe--blue:hover {
            border: 2px solid #3A86FF;
        }

        .btn-half-swipe--green:after {
            border-top: 80px solid #80ED99;
        }

        .btn-half-swipe--green:hover {
            border: 2px solid #80ED99;
        }

        .btn-half-swipe--gray:after {
            border-top: 80px solid #ccc;
        }

        .btn-half-swipe--gray:hover {
            border: 2px solid #ccc;
        }

        /* Shadow drop */
        .btn-shadow-drop {
            position: relative;
            margin-top: 10%;
            background: #f9fafa;
            padding: 20px;
            font-size: 0.9em;
            font-weight: 700;
            letter-spacing: 5px;
            text-transform: uppercase;
            transition: all 300ms ease-in-out;
            left: 0;
            top: 0;
            width: 180px;
        }

        .btn-shadow-drop:hover {
            left: 4px;
            top: 4px;
            box-shadow: 0 0 0 0 white;
        }

        .btn-shadow-drop--black {
            border: 1px solid #333;
            color: #333;
            box-shadow: 4px 4px 0px 0px #333;
        }

        .btn-shadow-drop--orange {
            border: 1px solid #FEAE00;
            color: #FEAE00;
            box-shadow: 4px 4px 0px 0px #FEAE00;
        }

        .btn-shadow-drop--red {
            border: 1px solid #EF233C;
            color: #EF233C;
            box-shadow: 4px 4px 0px 0px #EF233C;
        }

        .btn-shadow-drop--blue {
            border: 1px solid #3A86FF;
            color: #3A86FF;
            box-shadow: 4px 4px 0px 0px #3A86FF;
        }

        .btn-shadow-drop--green {
            border: 1px solid #80ED99;
            color: #80ED99;
            box-shadow: 4px 4px 0px 0px #80ED99;
        }

        .btn-shadow-drop--purple {
            border: 1px solid #3D348B;
            color: #3D348B;
            box-shadow: 4px 4px 0px 0px #3D348B;
        }

        /* Neumorphic enabled and disabled */
        .neumorphic-section {
            padding-top: 10px;
            background: #eee;
        }

        .neumorphic {
            -webkit-appearance: none;
            user-select: none;
            display: flex;
            align-items: center;
            justify-content: center;
            outline: none;
            cursor: pointer;
            width: 200px;
            height: 50px;
            background-image: linear-gradient(to top, #D8D9DB 0%, #fff 80%, #FDFDFD 100%);
            border-radius: 30px;
            border: 1px solid #8F9092;
            box-shadow: 0 4px 3px 1px #FCFCFC, 0 6px 8px #D6D7D9, 0 -4px 4px #CECFD1, 0 -6px 4px #FEFEFE, inset 0 0 3px 0 #CECFD1;
            transition: all .2s ease;
            font-family: "Source Sans Pro", sans-serif;
            font-size: 14px;
            font-weight: 600;
            color: #606060;
            text-shadow: 0 1px #fff;
        }

        .neumorphic::-moz-focus-inner {
            border: 0
        }

        .neumorphic>* {
            transition: transform .2s ease;
            transform: scale(.975)
        }

        .neumorphic:hover:not([disabled]) {
            box-shadow: 0 4px 3px 1px #FCFCFC, 0 6px 8px #D6D7D9, 0 -4px 4px #CECFD1, 0 -6px 4px #FEFEFE, inset 0 0 3px 3px #CECFD1;
        }

        .neumorphic-enabled:focus:not(:active) {
            outline: none;
        }

        .neumorphic-enabled:active:not([disabled]) {
            box-shadow: 0 4px 3px 1px #FCFCFC, 0 6px 8px #D6D7D9, 0 -4px 4px #CECFD1, 0 -6px 4px #FEFEFE, inset 0 0 5px 3px #999, inset 0 0 30px #aaa;
        }

        .neumorphic:hover {
            color: #606060;
            text-shadow: 0 1px #fff;
        }

        .neumorphic-disabled {
            opacity: 0.5;
            cursor: not-allowed !important;
        }

        /* Layered 3d */
        .btn-layered-3d,
        .btn-layered-3d>*,
        .btn-layered-3d>*::before,
        .btn-layered-3d>*::after {
            box-sizing: border-box;
        }

        .btn-layered-3d {
            width: 180px;
            position: relative;
            display: inline-block;
            cursor: pointer;
            outline: none;
            border: 0;
            vertical-align: middle;
            text-decoration: none;
            font-size: inherit;
            font-family: inherit;
            font-weight: 600;
            text-transform: uppercase;
            padding: 1.15em 2em;
            border-radius: 0.75em;
            transform-style: preserve-3d;
            transition: transform 150ms cubic-bezier(0, 0, 0.58, 1), background 150ms cubic-bezier(0, 0, 0.58, 1);
        }

        .btn-layered-3d::before {
            position: absolute;
            content: '';
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border-radius: inherit;
            transform: translate3d(0, 0.75em, -1em);
            transition: transform 150ms cubic-bezier(0, 0, 0.58, 1), box-shadow 150ms cubic-bezier(0, 0, 0.58, 1);
        }

        .btn-layered-3d:hover {
            transform: translate(0, 0.25em);
        }

        .btn-layered-3d:hover::before {
            transform: translate3d(0, 0.5em, -1em);
        }

        .btn-layered-3d--pink {
            color: hsl(342, 70%, 34%);
            background: hsl(342, 100%, 95%);
            border: 2px solid hsl(342, 70%, 34%);
        }

        .btn-layered-3d--pink::before {
            background: hsl(342, 100%, 85%);
            box-shadow: 0 0 0 2px hsl(342, 70%, 34%), 0 0.625em 0 0 hsl(342, 100%, 95%);
        }

        .btn-layered-3d--orange {
            color: hsl(41, 89%, 46%);
            background: hsl(41, 100%, 90%);
            border: 2px solid hsl(41, 89%, 46%);
        }

        .btn-layered-3d--orange::before {
            background: hsl(41, 100%, 75%);
            box-shadow: 0 0 0 2px hsl(41, 89%, 46%), 0 0.625em 0 0 hsl(41, 100%, 90%);
        }

        .btn-layered-3d--red {
            color: hsl(353, 86%, 54%);
            background: hsl(353, 86%, 94%);
            border: 2px solid hsl(353, 86%, 54%);
        }

        .btn-layered-3d--red::before {
            background: hsl(353, 86%, 74%);
            box-shadow: 0 0 0 2px hsl(353, 86%, 54%), 0 0.625em 0 0 hsl(353, 86%, 94%);
        }

        .btn-layered-3d--blue {
            color: hsl(217, 100%, 62%);
            background: hsl(217, 100%, 92%);
            border: 2px solid hsl(217, 100%, 62%);
        }

        .btn-layered-3d--blue::before {
            background: hsl(217, 100%, 79%);
            box-shadow: 0 0 0 2px hsl(217, 100%, 62%), 0 0.625em 0 0 hsl(217, 100%, 92%);
        }

        .btn-layered-3d--green {
            color: hsl(134, 47%, 44%);
            background: hsl(134, 47%, 94%);
            border: 2px solid hsl(134, 47%, 44%);
        }

        .btn-layered-3d--green::before {
            background: hsl(134, 47%, 74%);
            box-shadow: 0 0 0 2px hsl(134, 47%, 44%), 0 0.625em 0 0 hsl(134, 47%, 94%);
        }

        .btn-layered-3d--purple {
            color: hsl(246, 45%, 38%);
            background: hsl(246, 45%, 88%);
            border: 2px solid hsl(246, 45%, 38%);
        }

        .btn-layered-3d--purple::before {
            background: hsl(246, 45%, 68%);
            box-shadow: 0 0 0 2px hsl(246, 45%, 38%), 0 0.625em 0 0 hsl(246, 45%, 88%);
        }

        /* Button 17 */
        .btn-arrow-slide-cont {
            position: relative;
            display: inline-block;
            cursor: pointer;
            outline: none;
            border: 0;
            vertical-align: middle;
            text-decoration: none;
            background: transparent;
            padding: 0;
            font-size: inherit;
            font-family: inherit;
            width: 180px;
            height: auto;
        }

        .btn-arrow-slide-cont:hover {
            background: transparent;
        }

        .btn-arrow-slide-circle {
            transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
            position: relative;
            display: block;
            margin: 0;
            width: 3rem;
            height: 3rem;
            border-radius: 1.625rem;
        }

        .btn-arrow-slide-circle .btn-arrow-slide-icon {
            transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
            position: absolute;
            top: 0;
            bottom: 0;
            margin: auto;
            background: #fff;
        }

        .btn-arrow-slide-circle .btn-arrow-slide-icon.btn-arrow-slide-arrow {
            transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
            left: 0.625rem;
            width: 1.125rem;
            height: 0.125rem;
            background: none;
        }

        .btn-arrow-slide-arrow::before {
            position: absolute;
            content: '';
            top: -0.25rem;
            right: 0.0625rem;
            width: 0.625rem;
            height: 0.625rem;
            border-top: 0.125rem solid #fff;
            border-right: 0.125rem solid #fff;
            transform: rotate(45deg);
        }

        .btn-arrow-slide-text {
            transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            padding: 0.75rem 0;
            margin: 0 0 0 1.85rem;
            font-weight: 700;
            line-height: 1.6;
            text-align: center;
            text-transform: uppercase;
        }

        .btn-arrow-slide-cont:hover .btn-arrow-slide-circle {
            width: 100%;
        }

        .btn-arrow-slide-cont:hover .btn-arrow-slide-circle .btn-arrow-slide-icon.btn-arrow-slide-arrow {
            background: #fff;
            transform: translate(1rem, 0);
        }

        .btn-arrow-slide-cont:hover .btn-arrow-slide-text {
            color: #fff;
        }

        .btn-arrow-slide-cont--black .btn-arrow-slide-circle {
            background: #333;
        }

        .btn-arrow-slide-cont--black .btn-arrow-slide-text {
            color: #333;
        }

        .btn-arrow-slide-cont--orange .btn-arrow-slide-circle {
            background: #FEC23F;
        }

        .btn-arrow-slide-cont--orange .btn-arrow-slide-text {
            color: #FEC23F;
        }

        .btn-arrow-slide-cont--red .btn-arrow-slide-circle {
            background: #EF233C;
        }

        .btn-arrow-slide-cont--red .btn-arrow-slide-text {
            color: #EF233C;
        }

        .btn-arrow-slide-cont--green .btn-arrow-slide-circle {
            background: rgb(83, 187, 107);
        }

        .btn-arrow-slide-cont--green .btn-arrow-slide-text {
            color: rgb(83, 187, 107);
        }

        .btn-arrow-slide-cont--blue .btn-arrow-slide-circle {
            background: #3A86FF;
        }

        .btn-arrow-slide-cont--blue .btn-arrow-slide-text {
            color: #3A86FF;
        }

        .btn-arrow-slide-cont--purple .btn-arrow-slide-circle {
            background: #3D348B;
        }

        .btn-arrow-slide-cont--purple .btn-arrow-slide-text {
            color: #3D348B;
        }

        /* Stripe bottom */
        @keyframes stripe-slide {
            0% {
                background-position: 0% 0;
            }

            100% {
                background-position: 100% 0;
            }
        }

        .btn-bottom-stripe {
            overflow: visible;
            margin: 0;
            padding: 0;
            border: 0;
            background: transparent;
            font: inherit;
            line-height: normal;
            cursor: pointer;
            -moz-user-select: text;
            display: block;
            text-decoration: none;
            text-transform: uppercase;
            padding: 16px 56px 22px;
            background-color: #fff;
            border-radius: 6px;
            margin-bottom: 16px;
            transition: all 0.5s ease;
            overflow: hidden;
            position: relative;
        }

        .btn-bottom-stripe:-moz-focus-inner {
            padding: 0;
            border: 0;
        }

        .btn-bottom-stripe:after {
            content: '';
            display: block;
            height: 7px;
            width: 100%;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            position: absolute;
            left: 0;
            bottom: 0;
            background-size: 7px 7px;
        }

        .btn-bottom-stripe:hover {
            color: #fff;
        }

        .btn-bottom-stripe:hover:after {
            background-image: repeating-linear-gradient(45deg, #fff, #fff 1px, transparent 2px, transparent 5px);
            animation: stripe-slide 12s infinite linear forwards;
        }

        .btn-bottom-stripe--black {
            color: #333;
            border: 2px solid #333;
        }

        .btn-bottom-stripe--black:after {
            border-top: 2px solid #333;
            background-image: repeating-linear-gradient(45deg, #333, #333 1px, transparent 2px, transparent 5px);
        }

        .btn-bottom-stripe--black:hover {
            background-color: #333;
        }

        .btn-bottom-stripe--orange {
            color: #FEC23F;
            border: 2px solid #FEC23F;
        }

        .btn-bottom-stripe--orange:after {
            border-top: 2px solid #FEC23F;
            background-image: repeating-linear-gradient(45deg, #FEC23F, #FEC23F 1px, transparent 2px, transparent 5px);
        }

        .btn-bottom-stripe--orange:hover {
            background-color: #FEC23F;
        }

        .btn-bottom-stripe--red {
            color: #EF233C;
            border: 2px solid #EF233C;
        }

        .btn-bottom-stripe--red:after {
            border-top: 2px solid #EF233C;
            background-image: repeating-linear-gradient(45deg, #EF233C, #EF233C 1px, transparent 2px, transparent 5px);
        }

        .btn-bottom-stripe--red:hover {
            background-color: #EF233C;
        }

        .btn-bottom-stripe--green {
            color: #53BB6B;
            border: 2px solid #53BB6B;
        }

        .btn-bottom-stripe--green:after {
            border-top: 2px solid #53BB6B;
            background-image: repeating-linear-gradient(45deg, #53BB6B, #53BB6B 1px, transparent 2px, transparent 5px);
        }

        .btn-bottom-stripe--green:hover {
            background-color: #53BB6B;
        }

        .btn-bottom-stripe--blue {
            color: #3A86FF;
            border: 2px solid #3A86FF;
        }

        .btn-bottom-stripe--blue:after {
            border-top: 2px solid #3A86FF;
            background-image: repeating-linear-gradient(45deg, #3A86FF, #3A86FF 1px, transparent 2px, transparent 5px);
        }

        .btn-bottom-stripe--blue:hover {
            background-color: #3A86FF;
        }

        .btn-bottom-stripe--purple {
            color: #3D348B;
            border: 2px solid #3D348B;
        }

        .btn-bottom-stripe--purple:after {
            border-top: 2px solid #3D348B;
            background-image: repeating-linear-gradient(45deg, #3D348B, #3D348B 1px, transparent 2px, transparent 5px);
        }

        .btn-bottom-stripe--purple:hover {
            background-color: #3D348B;
        }

        /* Draw border */
        .btn-draw-border {
            box-shadow: inset 0 0 0 4px #555;
            color: #555;
            transition: color 0.25s 0.0833333333s;
            position: absolute;
            background: none;
            border: none;
            cursor: pointer;
            width: 180px;
            padding: 1.5em;
            letter-spacing: 0.05rem;
            font-weight: bold;
        }

        .btn-draw-border::before,
        .btn-draw-border::after {
            border: 0 solid transparent;
            box-sizing: border-box;
            content: '';
            pointer-events: none;
            position: absolute;
            width: 0;
            height: 0;
            bottom: 0;
            right: 0;
        }

        .btn-draw-border::before {
            border-bottom-width: 4px;
            border-left-width: 4px;
        }

        .btn-draw-border::after {
            border-top-width: 4px;
            border-right-width: 4px;
        }

        .btn-draw-border:hover {
            background: transparent;
        }

        .btn-draw-border:hover::before,
        .btn-draw-border:hover::after {
            transition: border-color 0s, width 0.35s, height 0.15s;
            width: 100%;
            height: 100%;
        }

        .btn-draw-border:hover::before {
            transition-delay: 0s, 0.15s, 0.35s;
        }

        .btn-draw-border::after {
            transition-delay: 0.15s, 0.25s, 0s;
        }

        .btn-draw-border--orange:hover {
            color: #FDB000;
        }

        .btn-draw-border--orange:hover::before,
        .btn-draw-border--orange:hover::after {
            border-color: #FDB000;
        }

        .btn-draw-border--red:hover {
            color: #EF233C;
        }

        .btn-draw-border--red:hover::before,
        .btn-draw-border--red:hover::after {
            border-color: #EF233C;
        }

        .btn-draw-border--blue:hover {
            color: #3A86FF;
        }

        .btn-draw-border--blue:hover::before,
        .btn-draw-border--blue:hover::after {
            border-color: #3A86FF;
        }

        .btn-draw-border--green:hover {
            color: #80ED99;
        }

        .btn-draw-border--green:hover::before,
        .btn-draw-border--green:hover::after {
            border-color: #80ED99;
        }

        .btn-draw-border--purple:hover {
            color: #3D348B;
        }

        .btn-draw-border--purple:hover::before,
        .btn-draw-border--purple:hover::after {
            border-color: #3D348B;
        }

        .btn-draw-border--pink:hover {
            color: #FF6392;
        }

        .btn-draw-border--pink:hover::before,
        .btn-draw-border--pink:hover::after {
            border-color: #FF6392;
        }

        /* Striped shadow 3d */
        .btn-striped-shadow {
            overflow: visible;
            border: 0;
            padding: 0;
            display: inline-block;
            letter-spacing: 1px;
            position: relative;
            transition: opacity .3s, z-index .3s step-end, -webkit-transform .3s;
            transition: opacity .3s, z-index .3s step-end, transform .3s;
            transition: opacity .3s, z-index .3s step-end, transform .3s, -webkit-transform .3s;
            z-index: 1;
            background-color: #fafafa;
            cursor: pointer;
            width: 180px;
            height: 48px;
            line-height: 38px;
        }

        .btn-striped-shadow span {
            display: block;
            position: relative;
            z-index: 2;
            border: 5px solid;
            background: #fafafa;
        }

        .btn-striped-shadow:after,
        .btn-striped-shadow:before {
            content: '';
            display: block;
            position: absolute;
            z-index: 1;
            transition: max-height .3s, width .3s, -webkit-transform .3s;
            transition: transform .3s, max-height .3s, width .3s;
            transition: transform .3s, max-height .3s, width .3s, -webkit-transform .3s;
        }

        .btn-striped-shadow:after {
            width: calc(100% - 4px);
            height: 8px;
            left: -10px;
            bottom: -9px;
            background-size: 15px 8px;
            background-repeat: repeat-x;
        }

        .btn-striped-shadow:before {
            width: 8px;
            max-height: calc(100% - 5px);
            height: 100%;
            left: -12px;
            bottom: -5px;
            background-size: 8px 15px;
            background-repeat: repeat-y;
            background-position: 0 100%;
        }

        .btn-striped-shadow:hover {
            -webkit-transform: translate(-12px, 12px);
            -ms-transform: translate(-12px, 12px);
            transform: translate(-12px, 12px);
            z-index: 3;
        }

        .btn-striped-shadow:hover:before {
            max-height: calc(100% - 10px);
        }

        .btn-striped-shadow:hover:after,
        .btn-striped-shadow:hover:before {
            -webkit-transform: translate(12px, -12px);
            -ms-transform: translate(12px, -12px);
            transform: translate(12px, -12px);
        }

        .btn-striped-shadow--black:after,
        .btn-striped-shadow--black:before {
            background-image: linear-gradient(135deg, transparent 0, transparent 5px, #333 5px, #333 10px, transparent 10px);
        }

        .btn-striped-shadow--black span {
            border-color: #333;
            color: #333;
        }

        .btn-striped-shadow--orange:after,
        .btn-striped-shadow--orange:before {
            background-image: linear-gradient(135deg, transparent 0, transparent 5px, #FEC54B 5px, #FEC54B 10px, transparent 10px);
        }

        .btn-striped-shadow--orange span {
            border-color: #FEC54B;
            color: #FEC54B;
        }

        .btn-striped-shadow--red:after,
        .btn-striped-shadow--red:before {
            background-image: linear-gradient(135deg, transparent 0, transparent 5px, #F03048 5px, #F03048 10px, transparent 10px);
        }

        .btn-striped-shadow--red span {
            border-color: #F03048;
            color: #F03048;
        }

        .btn-striped-shadow--blue:after,
        .btn-striped-shadow--blue:before {
            background-image: linear-gradient(135deg, transparent 0, transparent 5px, #3A86FF 5px, #3A86FF 10px, transparent 10px);
        }

        .btn-striped-shadow--blue span {
            border-color: #3A86FF;
            color: #3A86FF;
        }

        .btn-striped-shadow--green:after,
        .btn-striped-shadow--green:before {
            background-image: linear-gradient(135deg, transparent 0, transparent 5px, #53BB6B 5px, #53BB6B 10px, transparent 10px);
        }

        .btn-striped-shadow--green span {
            border-color: #53BB6B;
            color: #53BB6B;
        }

        .btn-striped-shadow--purple:after,
        .btn-striped-shadow--purple:before {
            background-image: linear-gradient(135deg, transparent 0, transparent 5px, #3D348B 5px, #3D348B 10px, transparent 10px);
        }

        .btn-striped-shadow--purple span {
            border-color: #3D348B;
            color: #3D348B;
        }

        /* Flip button */
        .btn-flip-side-cont {
            width: 180px;
            height: 60px;
            cursor: pointer;
            perspective: 500px;
            -webkit-perspective: 500px;
            margin-left: 5%;
        }

        .btn-flip-side {
            height: 100%;
            transform-style: preserve-3d;
            -webkit-transform-style: preserve-3d;
            transition: 0.25s;
            -webkit-transition: 0.25s;
        }

        .btn-flip-side-cont:hover .btn-flip-side {
            transform: rotateX(-90deg);
        }

        .btn-flip-side>span {
            width: 200px;
            height: 100%;
            position: absolute;
            box-sizing: border-box;
            line-height: 50px;
            text-align: center;
        }

        .btn-flip-side>span:nth-child(1) {
            transform: translate3d(0, 0, 30px);
            -webkit-transform: translate3d(0, 0, 30px);
        }

        .btn-flip-side>span:nth-child(2) {
            color: #fff;
            transform: rotateX(90deg) translate3d(0, 0, 30px);
            -webkit-transform: rotateX(90deg) translate3d(0, 0, 30px);
        }

        .btn-flip-side--black>span {
            border: 5px solid #333;
        }

        .btn-flip-side--black>span:nth-child(1) {
            color: #333;
        }

        .btn-flip-side--black>span:nth-child(2) {
            background: #333;
        }

        .btn-flip-side--orange>span {
            border: 5px solid #FEC54B;
        }

        .btn-flip-side--orange>span:nth-child(1) {
            color: #FEC54B;
        }

        .btn-flip-side--orange>span:nth-child(2) {
            background: #FEC54B;
        }

        .btn-flip-side--red>span {
            border: 5px solid #F03048;
        }

        .btn-flip-side--red>span:nth-child(1) {
            color: #F03048;
        }

        .btn-flip-side--red>span:nth-child(2) {
            background: #F03048;
        }

        .btn-flip-side--blue>span {
            border: 5px solid #3A86FF;
        }

        .btn-flip-side--blue>span:nth-child(1) {
            color: #3A86FF;
        }

        .btn-flip-side--blue>span:nth-child(2) {
            background: #3A86FF;
        }

        .btn-flip-side--purple>span {
            border: 5px solid #3D348B;
        }

        .btn-flip-side--purple>span:nth-child(1) {
            color: #3D348B;
        }

        .btn-flip-side--purple>span:nth-child(2) {
            background: #3D348B;
        }

        .btn-flip-side--green>span {
            border: 5px solid #53BB6B;
        }

        .btn-flip-side--green>span:nth-child(1) {
            color: #53BB6B;
        }

        .btn-flip-side--green>span:nth-child(2) {
            background: #53BB6B;
        }

        /* Flashy background slide */
        .btn-background-slide {
            width: 180px;
            padding: 6px;
            height: 50px;
            color: #333;
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            -o-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            border: #333 2px solid;
            overflow: hidden;
            -webkit-transition: all 0.6s cubic-bezier(0.55, 0, 0.1, 1);
            -moz-transition: all 0.6s cubic-bezier(0.55, 0, 0.1, 1);
            -o-transition: all 0.6s cubic-bezier(0.55, 0, 0.1, 1);
            transition: all 0.6s cubic-bezier(0.55, 0, 0.1, 1);
            cursor: pointer;
            box-shadow: 0px 0px 0px #333;
        }

        .btn-background-slide:hover {
            box-shadow: 8px 8px 0px #333, -8px -8px 0px #333;
        }

        .btn-background-slide:hover .btn-background-slide-bg {
            opacity: 1;
            transform: translate3d(0px, 0px, 0px);
        }

        .btn-background-slide-bg {
            width: 100%;
            height: 100%;
            position: absolute;
            background: transparent;
            top: 0;
            left: 0;
            transform: translate3d(0px, 90px, 0px);
            -webkit-transition: all 0.3s cubic-bezier(0.55, 0, 0.1, 1);
            -moz-transition: all 0.3s cubic-bezier(0.55, 0, 0.1, 1);
            -o-transition: all 0.3s cubic-bezier(0.55, 0, 0.1, 1);
            transition: all 0.3s cubic-bezier(0.55, 0, 0.1, 1);
            z-index: -1;
        }

        .btn-background-slide--orange {
            background-color: #FEC54B;
        }

        .btn-background-slide--red {
            background-color: #F03048;
        }

        .btn-background-slide--pink {
            background-color: #F13C51;
        }

        .btn-background-slide--blue {
            background-color: #3A86FF;
        }

        .btn-background-slide--green {
            background-color: #53BB6B;
        }

        .btn-background-slide--purple {
            background-color: rgb(134, 126, 206);
        }

        /* Shadow */
        .btn-shadow {
            display: inline-block;
            margin: 5px;
            font-weight: 500;
            line-height: 24px;
            color: #fff;
            position: relative;
            text-align: center;
            background: none;
            outline: none;
            border: none;
        }

        .btn-shadow:before {
            content: '';
            display: inline-block;
            height: 40px;
            position: absolute;
            bottom: -1px;
            left: 10px;
            right: 10px;
            z-index: 0;
            border-radius: 2em;
            filter: blur(14px) brightness(0.9);
            transform-style: preserve-3d;
            transition: all 0.3s ease-out;
        }

        .btn-shadow span {
            display: inline-block;
            padding: 16px 60px;
            border-radius: 50em;
            position: relative;
            z-index: 2;
            will-change: transform, filter;
            transform-style: preserve-3d;
            transition: all 0.3s ease-out;
        }

        .btn-shadow:hover {
            color: #fff;
        }

        .btn-shadow:hover span {
            filter: brightness(0.9) contrast(1.2);
            transform: scale(0.96);
        }

        .btn-shadow:hover:before {
            bottom: 8px;
            filter: blur(6px) brightness(0.8);
            left: 15px;
            right: 15px;
        }

        .btn-shadow--orange span,
        .btn-shadow--orange:before {
            background: #FEC54B;
        }

        .btn-shadow--black span,
        .btn-shadow--black:before {
            background: #333;
        }

        .btn-shadow--red span,
        .btn-shadow--red:before {
            background: #F03048;
        }

        .btn-shadow--blue span,
        .btn-shadow--blue:before {
            background: #3A86FF;
        }

        .btn-shadow--green span,
        .btn-shadow--green:before {
            background: #53BB6B;
        }

        .btn-shadow--purple span,
        .btn-shadow--purple:before {
            background: #3D348B;
        }

        /* Pushable */
        .btn-pushable {
            padding: 15px;
            margin-right: 5px;
            height: 50px;
            width: 180px;
            border: none;
            outline: none;
            color: white;
            font-family: inherit;
            border-radius: 3px;
        }

        .btn-pushable:hover {
            transition: all 0.1s ease-in;
        }

        .btn-pushable:active {
            transform: translateY(4px);
            border-bottom-width: 2px;
            box-shadow: none;
        }

        .btn-pushable--black {
            background: #333;
            box-shadow: 0 6px 0px #333;
            border-bottom: 3px solid #222;
        }

        .btn-pushable--black:hover {
            background: #222;
            box-shadow: 0 4px 1px #222;
            border-bottom: 3px solid #111;
        }

        .btn-pushable--orange {
            background: hsl(41, 99%, 65%);
            box-shadow: 0 6px 0px hsl(41, 99%, 65%);
            border-bottom: 3px solid hsl(41, 95%, 60%);
        }

        .btn-pushable--orange:hover {
            background: hsl(41, 95%, 60%);
            box-shadow: 0 4px 1px hsl(41, 95%, 60%);
            border-bottom: 3px solid hsl(41, 95%, 55%);
        }

        .btn-pushable--red {
            background: hsl(353, 87%, 56%);
            box-shadow: 0 6px 0px hsl(353, 87%, 56%);
            border-bottom: 3px solid hsl(353, 85%, 49%);
        }

        .btn-pushable--red:hover {
            background: hsl(353, 85%, 49%);
            box-shadow: 0 4px 1px hsl(353, 85%, 49%);
            border-bottom: 3px solid hsl(353, 82%, 44%);
        }

        .btn-pushable--blue {
            background: hsl(217, 100%, 62%);
            box-shadow: 0 6px 0px hsl(217, 100%, 62%);
            border-bottom: 3px solid hsl(217, 97%, 57%);
        }

        .btn-pushable--blue:hover {
            background: hsl(217, 97%, 57%);
            box-shadow: 0 4px 1px hsl(217, 97%, 57%);
            border-bottom: 3px solid hsl(217, 95%, 52%);
        }

        .btn-pushable--green {
            background: hsl(134, 43%, 53%);
            box-shadow: 0 6px 0px hsl(134, 43%, 53%);
            border-bottom: 3px solid hsl(134, 40%, 48%);
        }

        .btn-pushable--green:hover {
            background: hsl(134, 40%, 48%);
            box-shadow: 0 4px 1px hsl(134, 40%, 48%);
            border-bottom: 3px solid hsl(134, 37%, 42%);
        }

        .btn-pushable--purple {
            background: hsl(246, 45%, 38%);
            box-shadow: 0 6px 0px hsl(246, 45%, 38%);
            border-bottom: 3px solid hsl(246, 43%, 32%);
        }

        .btn-pushable--purple:hover {
            background: hsl(246, 43%, 32%);
            box-shadow: 0 4px 1px hsl(246, 43%, 32%);
            border-bottom: 3px solid hsl(246, 40%, 28%);
        }

        /* Fill bottom right */
        .btn-fill-bottom {
            border: none;
            outline: none;
            background: none;
            text-align: center;
            display: inline-block;
            width: 180px;
            height: 40px;
            margin: 20px;
            position: relative;
            overflow: hidden;
            transition: color .5s;
        }

        .btn-fill-bottom:before {
            content: "";
            position: absolute;
            z-index: -1;
            height: 200px;
            width: 250px;
            border-radius: 50%;
            top: 100%;
            left: 100%;
            transition: all .7s;
        }

        .btn-fill-bottom:hover {
            color: #fff;
        }

        .btn-fill-bottom:hover:before {
            top: -40px;
            left: -40px;
        }

        .btn-fill-bottom--black {
            color: #333;
            border: 2px solid #333;
        }

        .btn-fill-bottom--black:before {
            background: #333;
        }

        .btn-fill-bottom--orange {
            color: #FEC64D;
            border: 2px solid #FEC64D;
        }

        .btn-fill-bottom--orange:before {
            background: #FEC64D;
        }

        .btn-fill-bottom--red {
            color: #F02D44;
            border: 2px solid #F02D44;
        }

        .btn-fill-bottom--red:before {
            background: #F02D44;
        }

        .btn-fill-bottom--blue {
            color: #3D87FF;
            border: 2px solid #3D87FF;
        }

        .btn-fill-bottom--blue:before {
            background: #3D87FF;
        }

        .btn-fill-bottom--green {
            color: #54BB6C;
            border: 2px solid #54BB6C;
        }

        .btn-fill-bottom--green:before {
            background: #54BB6C;
        }

        .btn-fill-bottom--purple {
            color: #3E358D;
            border: 2px solid #3E358D;
        }

        .btn-fill-bottom--purple:before {
            background: #3E358D;
        }

        /* Fill down */
        .btn-down {
            border: none;
            outline: none;
            background: none;
            text-align: center;
            display: inline-block;
            width: 180px;
            height: 40px;
            margin: 20px;
            position: relative;
            overflow: hidden;
            transition: color .5s;
        }

        .btn-down:before {
            content: "";
            position: absolute;
            z-index: -1;
            height: 200px;
            width: 250px;
            border-radius: 50%;
            bottom: 100%;
            left: -30px;
            transition: all .7s;
        }

        .btn-down:hover {
            color: #fff;
        }

        .btn-down:hover:before {
            bottom: -50px;
        }

        .btn-down--black {
            color: #333;
            border: 2px solid #333;
        }

        .btn-down--black:before {
            background: #333;
        }

        .btn-down--orange {
            color: #FEC64D;
            border: 2px solid #FEC64D;
        }

        .btn-down--orange:before {
            background: #FEC64D;
        }

        .btn-down--red {
            color: #F02D44;
            border: 2px solid #F02D44;
        }

        .btn-down--red:before {
            background: #F02D44;
        }

        .btn-down--blue {
            color: #3D87FF;
            border: 2px solid #3D87FF;
        }

        .btn-down--blue:before {
            background: #3D87FF;
        }

        .btn-down--green {
            color: #54BB6C;
            border: 2px solid #54BB6C;
        }

        .btn-down--green:before {
            background: #54BB6C;
        }

        .btn-down--purple {
            color: #3E358D;
            border: 2px solid #3E358D;
        }

        .btn-down--purple:before {
            background: #3E358D;
        }

        /* Flash slide */
        .flash-slide {
            border: none;
            display: inline-block;
            color: #fff;
            margin: 20px;
            width: 180px;
            height: 50px;
            border-radius: 10px;
            position: relative;
            overflow: hidden;
            text-decoration: none;
            text-transform: uppercase;
            font-family: Helvetica;
            text-align: center;
        }

        .flash-slide:before {
            content: "";
            position: absolute;
            top: -30px;
            left: -80px;
            height: 100px;
            width: 70px;
            background: rgba(255, 255, 255, .3);
            transform: rotate(20deg);
        }

        .flash-slide:hover:before {
            left: 190px;
            transition: all .5s;
        }

        .flash-slide--black {
            background: #333;
        }

        .flash-slide--orange {
            background: #FEC64D;
        }

        .flash-slide--red {
            background: #F02D44;
        }

        .flash-slide--blue {
            background: #3D87FF;
        }

        .flash-slide--green {
            background: #54BB6C;
        }

        .flash-slide--purple {
            background: #3E358D;
        }

        /* Zoom out */
        .zoom-out {
            display: inline-block;
            color: #fff;
            margin: 20px;
            width: 180px;
            height: 50px;
            border-radius: 10px;
            position: relative;
            overflow: hidden;
            text-decoration: none;
            text-transform: uppercase;
            font-family: Helvetica;
            text-align: center;
            transition: all .5s;
            border: none;
        }

        .zoom-out:hover {
            transform: scale(1.1);
        }

        .zoom-out--black {
            background: #333;
        }

        .zoom-out--orange {
            background: #FEC64D;
        }

        .zoom-out--red {
            background: #F02D44;
        }

        .zoom-out--blue {
            background: #3D87FF;
        }

        .zoom-out--green {
            background: #54BB6C;
        }

        .zoom-out--purple {
            background: #3E358D;
        }

        /* Button 35 */
        .fill-center {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
            text-decoration: none;
            cursor: pointer;
            border-radius: 8px;
            height: 50px;
            width: 180px;
            padding: 0;
            outline: none;
            overflow: hidden;
            transition: color 0.3s 0.1s ease-out;
            text-align: center;
            background: transparent;
        }

        .fill-center::before {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
            content: '';
            border-radius: 50%;
            display: block;
            width: 20em;
            height: 20em;
            line-height: 20em;
            left: -3em;
            text-align: center;
            transition: box-shadow 0.5s ease-out;
            z-index: -1;
        }

        .fill-center:hover {
            color: #fff;
            background: transparent;
        }

        .fill-center--black {
            border: 1px solid #333;
            color: #333;
        }

        .fill-center--black:hover::before {
            box-shadow: inset 0 0 0 11em #333;
        }

        .fill-center--orange {
            border: 1px solid #FEC64D;
            color: #FEC64D;
        }

        .fill-center--orange:hover::before {
            box-shadow: inset 0 0 0 11em #FEC64D;
        }

        .fill-center--red {
            border: 1px solid #F02D44;
            color: #F02D44;
        }

        .fill-center--red:hover::before {
            box-shadow: inset 0 0 0 11em #F02D44;
        }

        .fill-center--blue {
            border: 1px solid #3D87FF;
            color: #3D87FF;
        }

        .fill-center--blue:hover::before {
            box-shadow: inset 0 0 0 11em #3D87FF;
        }

        .fill-center--green {
            border: 1px solid #54BB6C;
            color: #54BB6C;
        }

        .fill-center--green:hover::before {
            box-shadow: inset 0 0 0 11em #54BB6C;
        }

        .fill-center--purple {
            border: 1px solid #3E358D;
            color: #3E358D;
        }

        .fill-center--purple:hover::before {
            box-shadow: inset 0 0 0 11em #3E358D;
        }

        /* Sign post */
        .sign-post {
            display: inline-block;
            position: relative;
            color: #888;
            text-shadow: 0 1px 0 rgba(255, 255, 255, 0.8);
            text-decoration: none;
            text-align: center;
            padding: 8px 12px;
            width: 180px;
            font-size: 15px;
            font-weight: 700;
            font-family: helvetica, arial, sans-serif;
            border-radius: 4px;
            border: 1px solid #bcbcbc;
            -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12);
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12);
            background-image: -webkit-linear-gradient(top, rgba(255, 255, 255, 1) 0%, rgba(239, 239, 239, 1) 60%, rgba(225, 223, 226, 1) 100%);
            background-image: -moz-linear-gradient(top, rgba(255, 255, 255, 1) 0%, rgba(239, 239, 239, 1) 60%, rgba(225, 223, 226, 1) 100%);
            background-image: -o-linear-gradient(top, rgba(255, 255, 255, 1) 0%, rgba(239, 239, 239, 1) 60%, rgba(225, 223, 226, 1) 100%);
            background-image: -ms-linear-gradient(top, rgba(255, 255, 255, 1) 0%, rgba(239, 239, 239, 1) 60%, rgba(225, 223, 226, 1) 100%);
            background-image: linear-gradient(top, rgba(255, 255, 255, 1) 0%, rgba(239, 239, 239, 1) 60%, rgba(225, 223, 226, 1) 100%);
        }

        .sign-post:hover {
            color: #555;
        }

        .sign-post-back {
            border-left: none;
        }

        .sign-post-back:after {
            content: '';
            position: absolute;
            height: 50%;
            width: 15px;
            border-left: 1px solid #bcbcbc;
            background-image: -webkit-linear-gradient(top, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 1) 1%, rgba(240, 240, 240, 1) 100%);
            background-image: -moz-linear-gradient(top, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 1) 1%, rgba(240, 240, 240, 1) 100%);
            background-image: -o-linear-gradient(top, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 1) 1%, rgba(240, 240, 240, 1) 100%);
            background-image: -ms-linear-gradient(top, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 1) 1%, rgba(240, 240, 240, 1) 100%);
            background-image: linear-gradient(top, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 1) 1%, rgba(240, 240, 240, 1) 100%);
            left: -5px;
            top: 1px;
            -webkit-transform: skew(-35deg, 0);
            -moz-transform: skew(-35deg, 0);
            -o-transform: skew(-35deg, 0);
            -ms-transform: skew(-35deg, 0);
            transform: skew(-35deg, 0);
        }

        .sign-post-back:before {
            content: '';
            position: absolute;
            height: 48%;
            width: 15px;
            border-left: 1px solid #bcbcbc;
            bottom: 1px;
            left: -5px;
            -webkit-transform: skew(35deg, 0);
            -moz-transform: skew(35deg, 0);
            -o-transform: skew(35deg, 0);
            -ms-transform: skew(35deg, 0);
            transform: skew(35deg, 0);
            background-image: -webkit-linear-gradient(top, rgba(240, 240, 240, 1) 0%, rgba(239, 239, 239, 1) 10%, rgba(225, 223, 226, 1) 100%);
            background-image: -moz-linear-gradient(top, rgba(240, 240, 240, 1) 0%, rgba(239, 239, 239, 1) 10%, rgba(225, 223, 226, 1) 100%);
            background-image: -o-linear-gradient(top, rgba(240, 240, 240, 1) 0%, rgba(239, 239, 239, 1) 10%, rgba(225, 223, 226, 1) 100%);
            background-image: -ms-linear-gradient(top, rgba(240, 240, 240, 1) 0%, rgba(239, 239, 239, 1) 10%, rgba(225, 223, 226, 1) 100%);
            background-image: linear-gradient(top, rgba(240, 240, 240, 1) 0%, rgba(239, 239, 239, 1) 10%, rgba(225, 223, 226, 1) 100%);
            -webkit-box-shadow: -2px 1px 2px rgba(100, 100, 100, 0.1);
            box-shadow: -2px 1px 2px rgba(100, 100, 100, 0.1);
        }

        .sign-post-forward {
            border-right: none;
        }

        .sign-post-forward:after {
            content: '';
            position: absolute;
            height: 48%;
            width: 15px;
            border-right: 1px solid #bcbcbc;
            background-image: -webkit-linear-gradient(top, rgba(240, 240, 240, 1) 0%, rgba(239, 239, 239, 1) 10%, rgba(225, 223, 226, 1) 100%);
            background-image: -moz-linear-gradient(top, rgba(240, 240, 240, 1) 0%, rgba(239, 239, 239, 1) 10%, rgba(225, 223, 226, 1) 100%);
            background-image: -o-linear-gradient(top, rgba(240, 240, 240, 1) 0%, rgba(239, 239, 239, 1) 10%, rgba(225, 223, 226, 1) 100%);
            background-image: -ms-linear-gradient(top, rgba(240, 240, 240, 1) 0%, rgba(239, 239, 239, 1) 10%, rgba(225, 223, 226, 1) 100%);
            background-image: linear-gradient(top, rgba(240, 240, 240, 1) 0%, rgba(239, 239, 239, 1) 10%, rgba(225, 223, 226, 1) 100%);
            right: -5px;
            bottom: 1px;
            -webkit-transform: skew(-35deg, 0);
            -moz-transform: skew(-35deg, 0);
            -o-transform: skew(-35deg, 0);
            -ms-transform: skew(-35deg, 0);
            transform: skew(-35deg, 0);
            -webkit-box-shadow: 2px 1px 2px rgba(100, 100, 100, 0.1);
            box-shadow: 2px 1px 2px rgba(100, 100, 100, 0.1);
        }

        .sign-post-forward:before {
            content: '';
            position: absolute;
            background-image: -webkit-linear-gradient(top, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 1) 1%, rgba(240, 240, 240, 1) 100%);
            background-image: -moz-linear-gradient(top, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 1) 1%, rgba(240, 240, 240, 1) 100%);
            background-image: -o-linear-gradient(top, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 1) 1%, rgba(240, 240, 240, 1) 100%);
            background-image: -ms-linear-gradient(top, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 1) 1%, rgba(240, 240, 240, 1) 100%);
            background-image: linear-gradient(top, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 1) 1%, rgba(240, 240, 240, 1) 100%);
            height: 50%;
            width: 15px;
            border-right: 1px solid #bcbcbc;
            top: 1px;
            right: -5px;
            -webkit-transform: skew(35deg, 0);
            -moz-transform: skew(35deg, 0);
            -o-transform: skew(35deg, 0);
            -ms-transform: skew(35deg, 0);
            transform: skew(35deg, 0);
        }

        /* 3d top */
        .btn-top-3d {
            display: inline-block;
            position: relative;
            text-align: center;
            padding: 20px;
            width: 180px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #fff;
            text-decoration: none;
            transform: translate3d(0, 0, 0);
            transition: 0.1s background, 0.1s transform;
            border: none;
        }

        .btn-top-3d:hover {
            transform: translate3d(0, 8px, 0);
        }

        .btn-top-3d:after,
        .btn-top-3d:before {
            content: '';
            position: absolute;
            top: 100%;
            width: 50%;
            height: 8px;
            transition: 0.1s height, 0.1s background;
        }

        .btn-top-3d:after {
            right: 0;
            transform: skewX(-45deg);
            transform-origin: 0 0;
        }

        .btn-top-3d:before {
            left: 0;
            transform: skewX(45deg);
            transform-origin: 100% 0;
        }

        .btn-top-3d:hover:after,
        .btn-top-3d:hover:before {
            height: 0;
        }

        .btn-top-3d--black {
            background: #333;
        }

        .btn-top-3d--black:after,
        .btn-top-3d--black:before {
            background: #222;
        }

        .btn-top-3d--black:hover {
            background: #222;
        }

        .btn-top-3d--orange {
            background: #FEC64D;
        }

        .btn-top-3d--orange:after,
        .btn-top-3d--orange:before {
            background: #FABD38;
        }

        .btn-top-3d--orange:hover {
            background: #FABD38;
        }

        .btn-top-3d--red {
            background: #F02D44;
        }

        .btn-top-3d--red:after,
        .btn-top-3d--red:before {
            background: #E7132C;
        }

        .btn-top-3d--red:hover {
            background: #E7132C;
        }

        .btn-top-3d--green {
            background: #54BB6C;
        }

        .btn-top-3d--green:after,
        .btn-top-3d--green:before {
            background: #49AB60;
        }

        .btn-top-3d--green:hover {
            background: #49AB60;
        }

        .btn-top-3d--blue {
            background: #3D87FF;
        }

        .btn-top-3d--blue:after,
        .btn-top-3d--blue:before {
            background: rgb(35, 109, 230);
        }

        .btn-top-3d--blue:hover {
            background: rgb(35, 109, 230);
        }

        .btn-top-3d--purple {
            background: #3E358D;
        }

        .btn-top-3d--purple:after,
        .btn-top-3d--purple:before {
            background: #362F75;
        }

        .btn-top-3d--purple:hover {
            background: #362F75;
        }

        /* Border flip */
        .border-flip {
            display: inline-block;
            padding: 15px;
            width: 180px;
            position: relative;
            text-decoration: none;
            text-transform: uppercase;
            font-weight: 600;
            background: none;
            border: none;
        }

        .border-flip:before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            transform: perspective(350px) rotateX(0deg);
        }

        .border-flip:hover:before {
            transition: 0.35s ease all;
            transform: perspective(350px) rotateX(-180deg);
        }

        .border-flip:before {
            transition: 0.35s ease all;
        }

        .border-flip--black {
            color: #333;
        }

        .border-flip--black:before {
            border: solid 3px #333;
        }

        .border-flip--orange {
            color: #FEC64D;
        }

        .border-flip--orange:before {
            border: solid 3px #FEC64D;
        }

        .border-flip--red {
            color: #F02D44;
        }

        .border-flip--red:before {
            border: solid 3px #F02D44;
        }

        .border-flip--blue {
            color: #3D87FF;
        }

        .border-flip--blue:before {
            border: solid 3px #3D87FF;
        }

        .border-flip--green {
            color: #54BB6C;
        }

        .border-flip--green:before {
            border: solid 3px #54BB6C;
        }

        .border-flip--purple {
            color: #3E358D;
        }

        .border-flip--purple:before {
            border: solid 3px #3E358D;
        }



        .class-helper {
            background: #eee;
            padding: 20px;
            position: relative;
            box-shadow: 1px 1px 5px #333;
        }

        .close-icon {
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 25px;
            padding: 10px 20px;
            background: #ccc;
            position: absolute;
            top: 0;
            right: 0;
        }

        .tooltip {
            position: relative;
            display: inline-block;
        }

        .tooltip .tooltiptext {
            visibility: hidden;
            width: 140px;
            background-color: rgb(46, 48, 39);
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 10px;
            position: absolute;
            z-index: 1;
            bottom: 150%;
            left: 50%;
            margin-left: -75px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .tooltip .tooltiptext::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #555 transparent transparent transparent;
        }

        .tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }



        .code-area {
            width: 96%;
            position: fixed;
            background: #eee;
            padding: 50px 20px;
            bottom: 0;
            height: 50vh;
            transform: translateY(110%);
            transition: 0.5s;
            margin: auto;
            box-shadow: 1px 1px 6px rgba(0, 0, 0, 0.4)
        }


        .close-icon {
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 25px;
            padding: 10px 20px;
            background: #ccc;
            position: absolute;
            top: 0;
            right: 0;
            cursor: pointer;
        }

        .code-container pre {
            height: 80px;
            width: 96%;
            overflow: scroll;
            background: #F5F2F0 !important;
            padding: 20px;
            border: 1px solid #ccc;
            font-family: monospace;
        }

        .css-code-container pre {
            height: 150px;
        }

        .code-container pre code {
            color: rgb(58, 70, 82);
            text-shadow: 0 1px white;
            font-family: monospace;
            font-size: 1.2em;
            text-align: left;
            white-space: pre;
            word-spacing: normal;
            word-break: normal;
            word-wrap: normal;
            line-height: 1.5;
            -moz-tab-size: 4;
            tab-size: 4;
            -moz-hyphens: none;
            hyphens: none;
        }

        .code-header {
            display: flex;
            max-width: 200px;
            justify-content: space-between;
            align-items: center;
            margin-top: 30px;
        }

        .code-header h4 {
            margin: 3px 0;
        }

        1

    </style>
    {{-- ** Link css dài đừng mở ** --}}
    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

        * {
            box-sizing: border-box;
        }

        body {
            background: #f6f5f7;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            font-family: 'Montserrat', sans-serif;
            height: 100vh;
            margin: -20px 0 50px;
        }

        h1 {
            font-weight: bold;
            margin: 0;
        }

        h2 {
            text-align: center;
        }

        p {
            font-size: 14px;
            font-weight: 100;
            line-height: 20px;
            letter-spacing: 0.5px;
            margin: 20px 0 30px;
        }

        span {
            font-size: 12px;
        }

        a {
            color: #333;
            font-size: 14px;
            text-decoration: none;
            margin: 15px 0;
        }

        button {
            border-radius: 20px;
            border: 1px solid #FF4B2B;
            background-color: #FF4B2B;
            color: #FFFFFF;
            font-size: 12px;
            font-weight: bold;
            padding: 12px 45px;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: transform 80ms ease-in;
        }

        button:active {
            transform: scale(0.95);
        }

        button:focus {
            outline: none;
        }

        button.ghost {
            background-color: transparent;
            border-color: #FFFFFF;
        }

        form {
            margin: 20px;
            background-color: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 50px;
            height: 100%;
            text-align: center;
        }

        input {
            background-color: #eee;
            border: none;
            padding: 12px 15px;
            margin: 8px 0;
            width: 100%;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25),
                0 10px 10px rgba(0, 0, 0, 0.22);
            position: relative;
            overflow: hidden;
            width: 768px;
            max-width: 100%;
            min-height: 480px;
        }

        .form-container {
            position: absolute;
            top: 0;
            height: 100%;
            transition: all 0.6s ease-in-out;
        }

        .sign-in-container {
            left: 0;
            width: 50%;
            z-index: 2;
        }

        .container.right-panel-active .sign-in-container {
            transform: translateX(100%);
        }

        .sign-up-container {
            left: 0;
            width: 50%;
            opacity: 0;
            z-index: 1;
        }

        .container.right-panel-active .sign-up-container {
            transform: translateX(100%);
            opacity: 1;
            z-index: 5;
            animation: show 0.6s;
        }

        @keyframes show {

            0%,
            49.99% {
                opacity: 0;
                z-index: 1;
            }

            50%,
            100% {
                opacity: 1;
                z-index: 5;
            }
        }

        .overlay-container {
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            overflow: hidden;
            transition: transform 0.6s ease-in-out;
            z-index: 100;
        }

        .container.right-panel-active .overlay-container {
            transform: translateX(-100%);
        }

        .overlay {
            background: #FF416C;
            background: -webkit-linear-gradient(to right, #FF4B2B, #FF416C);
            background: linear-gradient(to right, #FF4B2B, #FF416C);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: 0 0;
            color: #FFFFFF;
            position: relative;
            left: -100%;
            height: 100%;
            width: 200%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }

        .container.right-panel-active .overlay {
            transform: translateX(50%);
        }

        .overlay-panel {
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 40px;
            text-align: center;
            top: 0;
            height: 100%;
            width: 50%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }

        .overlay-left {
            transform: translateX(-20%);
        }

        .container.right-panel-active .overlay-left {
            transform: translateX(0);
        }

        .overlay-right {
            right: 0;
            transform: translateX(0);
        }

        .container.right-panel-active .overlay-right {
            transform: translateX(20%);
        }

        .social-container {
            margin: 20px 0;
        }

        .social-container a {
            border: 1px solid #DDDDDD;
            border-radius: 50%;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            margin: 0 5px;
            height: 40px;
            width: 40px;
        }

        footer {
            background-color: #222;
            color: #fff;
            font-size: 14px;
            bottom: 0;
            position: fixed;
            left: 0;
            right: 0;
            text-align: center;
            z-index: 999;
        }

        footer p {
            margin: 10px 0;
        }

        footer i {
            color: red;
        }

        footer a {
            color: #3c97bf;
            text-decoration: none;
        }

    </style>
    <script>
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css");
    </script>
    @livewireStyles
    @livewireScripts
</head>

<body class="p-3">


    <h2 style="background-color: #fff ; padding:20px ; border-radius:10px">Galaxy cinema  </h2>
    <x-alert type="success" class="alert alert-success text-center" />
    <div style="width:90% !important ; height:90%" class="container " id="container">
        <div class="form-container sign-up-container p">

            @livewire('frontend.login.register')

        </div>
        <div class="form-container sign-in-container">

            @livewire('frontend.login.login')

        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Chào mừng trở lại!</h1>
                    <p>Để giữ kết nối với chúng tôi, vui lòng đăng nhập bằng thông tin cá nhân của bạn</p>
                    <button style="color: #fff !important;" id="signIn" class="ghost btn-arrow-slide-cont btn-arrow-slide-cont--red">
                        <span class="btn-arrow-slide-circle" aria-hidden="true">
                        <span class="btn-arrow-slide-icon btn-arrow-slide-arrow"></span>
                        </span>
                        <span class="btn-arrow-slide-text"> Đăng nhập </span>
                        </button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Chào bạn!</h1>
                    <p>Nhập thông tin cá nhân của bạn và bắt đầu hành trình với chúng tôi</p>
                    <button style="color: #fff !important;" id="signUp" class="ghost btn-arrow-slide-cont btn-arrow-slide-cont--red">
                        <span class="btn-arrow-slide-circle" aria-hidden="true">
                        <span class="btn-arrow-slide-icon btn-arrow-slide-arrow"></span>
                        </span>
                        <span class="btn-arrow-slide-text"> Đăng ký </span>
                        </button>
                </div>
            </div>
        </div>
    </div>


    <script>
        window.livewire.on('successGister', function(data) {
            alert(data);
        })
    </script>

    <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });
    </script>
</body>

</html>
