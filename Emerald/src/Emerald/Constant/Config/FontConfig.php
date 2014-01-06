<?php

namespace Emerald\Constant\Config;


class FontConfig
{

    private $fontName;
    private $currentWidth;

    public function __construct($fontName)
    {
        $this->fontName = $fontName;
        $this->currentWidth = array();
    }

    public function getWidth()
    {
        $method = "get{$this->fontName}Width";

        $this->$method();

        return $this->currentWidth;
    }

    private function getCourierWidth()
    {
        $this->getStandarCourierWidth();
    }

    private function getCourierBWidth()
    {
        $this->getStandarCourierWidth();
    }

    private function getCourierIWidth()
    {
        $this->getStandarCourierWidth();
    }

    private function getCourierBIWidth()
    {
        $this->getStandarCourierWidth();
    }

    private function getSymbolWidth()
    {
        $this->currentWidth = array(
            chr(0) => 250, chr(1) => 250, chr(2) => 250, chr(3) => 250, chr(4) => 250, chr(5) => 250, chr(6) => 250, chr(7) => 250, chr(8) => 250, chr(9) => 250, chr(10) => 250, chr(11) => 250, chr(12) => 250, chr(13) => 250, chr(14) => 250, chr(15) => 250, chr(16) => 250, chr(17) => 250, chr(18) => 250, chr(19) => 250, chr(20) => 250, chr(21) => 250,
            chr(22) => 250, chr(23) => 250, chr(24) => 250, chr(25) => 250, chr(26) => 250, chr(27) => 250, chr(28) => 250, chr(29) => 250, chr(30) => 250, chr(31) => 250, ' ' => 250, '!' => 333, '"' => 713, '#' => 500, '$' => 549, '%' => 833, '&' => 778, '\'' => 439, '(' => 333, ')' => 333, '*' => 500, '+' => 549,
            ',' => 250, '-' => 549, '.' => 250, '/' => 278, '0' => 500, '1' => 500, '2' => 500, '3' => 500, '4' => 500, '5' => 500, '6' => 500, '7' => 500, '8' => 500, '9' => 500, ':' => 278, ';' => 278, '<' => 549, '=' => 549, '>' => 549, '?' => 444, '@' => 549, 'A' => 722,
            'B' => 667, 'C' => 722, 'D' => 612, 'E' => 611, 'F' => 763, 'G' => 603, 'H' => 722, 'I' => 333, 'J' => 631, 'K' => 722, 'L' => 686, 'M' => 889, 'N' => 722, 'O' => 722, 'P' => 768, 'Q' => 741, 'R' => 556, 'S' => 592, 'T' => 611, 'U' => 690, 'V' => 439, 'W' => 768,
            'X' => 645, 'Y' => 795, 'Z' => 611, '[' => 333, '\\' => 863, ']' => 333, '^' => 658, '_' => 500, '`' => 500, 'a' => 631, 'b' => 549, 'c' => 549, 'd' => 494, 'e' => 439, 'f' => 521, 'g' => 411, 'h' => 603, 'i' => 329, 'j' => 603, 'k' => 549, 'l' => 549, 'm' => 576,
            'n' => 521, 'o' => 549, 'p' => 549, 'q' => 521, 'r' => 549, 's' => 603, 't' => 439, 'u' => 576, 'v' => 713, 'w' => 686, 'x' => 493, 'y' => 686, 'z' => 494, '{' => 480, '|' => 200, '}' => 480, '~' => 549, chr(127) => 0, chr(128) => 0, chr(129) => 0, chr(130) => 0, chr(131) => 0,
            chr(132) => 0, chr(133) => 0, chr(134) => 0, chr(135) => 0, chr(136) => 0, chr(137) => 0, chr(138) => 0, chr(139) => 0, chr(140) => 0, chr(141) => 0, chr(142) => 0, chr(143) => 0, chr(144) => 0, chr(145) => 0, chr(146) => 0, chr(147) => 0, chr(148) => 0, chr(149) => 0, chr(150) => 0, chr(151) => 0, chr(152) => 0, chr(153) => 0,
            chr(154) => 0, chr(155) => 0, chr(156) => 0, chr(157) => 0, chr(158) => 0, chr(159) => 0, chr(160) => 750, chr(161) => 620, chr(162) => 247, chr(163) => 549, chr(164) => 167, chr(165) => 713, chr(166) => 500, chr(167) => 753, chr(168) => 753, chr(169) => 753, chr(170) => 753, chr(171) => 1042, chr(172) => 987, chr(173) => 603, chr(174) => 987, chr(175) => 603,
            chr(176) => 400, chr(177) => 549, chr(178) => 411, chr(179) => 549, chr(180) => 549, chr(181) => 713, chr(182) => 494, chr(183) => 460, chr(184) => 549, chr(185) => 549, chr(186) => 549, chr(187) => 549, chr(188) => 1000, chr(189) => 603, chr(190) => 1000, chr(191) => 658, chr(192) => 823, chr(193) => 686, chr(194) => 795, chr(195) => 987, chr(196) => 768, chr(197) => 768,
            chr(198) => 823, chr(199) => 768, chr(200) => 768, chr(201) => 713, chr(202) => 713, chr(203) => 713, chr(204) => 713, chr(205) => 713, chr(206) => 713, chr(207) => 713, chr(208) => 768, chr(209) => 713, chr(210) => 790, chr(211) => 790, chr(212) => 890, chr(213) => 823, chr(214) => 549, chr(215) => 250, chr(216) => 713, chr(217) => 603, chr(218) => 603, chr(219) => 1042,
            chr(220) => 987, chr(221) => 603, chr(222) => 987, chr(223) => 603, chr(224) => 494, chr(225) => 329, chr(226) => 790, chr(227) => 790, chr(228) => 786, chr(229) => 713, chr(230) => 384, chr(231) => 384, chr(232) => 384, chr(233) => 384, chr(234) => 384, chr(235) => 384, chr(236) => 494, chr(237) => 494, chr(238) => 494, chr(239) => 494, chr(240) => 0, chr(241) => 329,
            chr(242) => 274, chr(243) => 686, chr(244) => 686, chr(245) => 686, chr(246) => 384, chr(247) => 384, chr(248) => 384, chr(249) => 384, chr(250) => 384, chr(251) => 384, chr(252) => 494, chr(253) => 494, chr(254) => 494, chr(255) => 0);
    }

    private function getStandarCourierWidth()
    {
        $this->resetCurrentWidth();

        for ($i = 0; $i <= 255; $i++) {
            $this->currentWidth[chr($i)] = 600;
        }
    }

    private function resetCurrentWidth()
    {
        $this->currentWidth = array();
    }

}
