<?php

//影视列表页

@session_start();
require_once('./inc/incill.php');
require_once('./conn/conn.php');

$pagenum = 16;
$sa = addslashes(stripcslashes(strip_tags(trim($_GET['sa']))));
$sb = addslashes(stripcslashes(strip_tags(trim($_GET['sb']))));
if ($sa == "")
{
    $psearr = explode(".", $psend);
    $psea = $psearr[0];
    $psebrr = explode("-", $psea);
    $pseb = trim($psebrr[0]);
    if (is_numeric($pseb))
    {
        $sa = $pseb;
    }
}
if ($sa != "")
{
    $hswz = "..";
}
$nlx = 102;
if ($sa == 2)
{
    $nlx = 103;
}
$bgimgurl = '';
$sql = mysqli_query($db,"select * from z_news where lx = '$nlx' order by paixu + '10000' asc limit 0,1");
$rs = mysqli_fetch_array($sql);
if (trim($rs['pica']) != "")
{
    $bgimgurl = '/upload/site/news/' . $rs['pica'];
}

$eysa = '';
$na = 0;
$sql = "select * from z_leixing where lx = '2' order by paixu + '10000' asc";
$que = mysqli_query($db,$sql);
while ($rs = mysqli_fetch_array($que))
{
    $na = $na + 1;
    $id = $rs['id'];
    $eysa .= '<a id="ysa' . $na . '" href="javascript:;" onClick="toval(\'sc|' . stripcslashes($rs['title']) . ',scn|' . $na . ',sct|\');selea()">' . stripcslashes($rs['title']) . '</a>';
}
$na = $na + 1;
$eysa .= '<a id="ysa' . $na . '" href="javascript:;" onClick="toval(\'scn|' . $na . '\');setar(\'tag-sm tag-type\',\'\',\'ysa\',' . $na . ',\'\');setar(\'dnone\',\'\',\'ysa\',' . $na . ',\'\');setar(\'\',\'dnone\',\'ysaa\',' . $na . ',\'\')">&gt;&gt;</a>
<a href="javascript:;" class="po_abs"><div id="ysaa' . $na . '" class="left po_rel top-3 dnone"><div class="wid10 left hig22 ov_hid"></div><div class="po_abs left0 top0 wid100 hig24 lh24 ov_hid"><label class="left"><input id="sct" type="text" class="left wid95 hig24 padl3 padr2 lh24 bor0 baise fs12 bghuise2" value="" maxlength="8"></label><div class="po_abs right0 top0 wid24 tex_c bglanlvse baise trall3 fs16 cur_p" onClick="toidval(\'sc|sct\');selea()"><i class="fa fa-search"></i></div></div></div></a>';
$eysb = '';
$na = 0;
$sql = "select * from z_leixing where lx = '3' order by paixu + '10000' asc";
$que = mysqli_query($db,$sql);
while ($rs = mysqli_fetch_array($que))
{
    $na = $na + 1;
    $id = $rs['id'];
    $eysb .= '<a id="ysb' . $na . '" href="javascript:;" onClick="toval(\'sd|' . $id . ',sdn|' . $na . ',sdt|\');selea()">' . stripcslashes($rs['title']) . '</a>';
}
$na = $na + 1;
$eysb .= '<a id="ysb' . $na . '" href="javascript:;" onClick="toval(\'sdn|' . $na . '\');setar(\'tag-sm tag-time\',\'\',\'ysb\',' . $na . ',\'\');setar(\'dnone\',\'\',\'ysb\',' . $na . ',\'\');setar(\'\',\'dnone\',\'ysba\',' . $na . ',\'\')">&gt;&gt;</a>
<a href="javascript:;" class="po_abs"><div id="ysba' . $na . '" class="left po_rel top-3 dnone"><div class="wid10 left hig22 ov_hid"></div><div class="po_abs left0 top0 wid100 hig24 lh24 ov_hid"><label class="left"><input id="sdt" type="text" class="left wid95 hig24 padl3 padr2 lh24 bor0 baise fs12 bghuise2" value="" maxlength="8"></label><div class="po_abs right0 top0 wid24 tex_c bglanlvse baise trall3 fs16 cur_p" onClick="toidval(\'sd|sdt\');selea()"><i class="fa fa-search"></i></div></div></div></a>';
$eysc = '';
$na = 0;
$sql = "select * from z_leixing where lx = '4' order by title desc";
$que = mysqli_query($db,$sql);
while ($rs = mysqli_fetch_array($que))
{
    $na = $na + 1;
    $id = $rs['id'];
    $eysc .= '<a id="ysc' . $na . '" href="javascript:;" onClick="toval(\'se|' . $id . ',sen|' . $na . ',set|\');selea()">' . stripcslashes($rs['title']) . '</a>';
}
$na = $na + 1;
$eysc .= '<a id="ysc' . $na . '" href="javascript:;" onClick="toval(\'sen|' . $na . '\');setar(\'tag-sm tag-size\',\'\',\'ysc\',' . $na . ',\'\');setar(\'dnone\',\'\',\'ysc\',' . $na . ',\'\');setar(\'\',\'dnone\',\'ysca\',' . $na . ',\'\')">&gt;&gt;</a>
<a href="javascript:;" class="po_abs"><div id="ysca' . $na . '" class="left po_rel top-3 dnone"><div class="wid10 left hig22 ov_hid"></div><div class="po_abs left0 top0 wid100 hig24 lh24 ov_hid"><label class="left"><input id="set" type="text" class="left wid95 hig24 padl3 padr2 lh24 bor0 baise fs12 bghuise2" value="" maxlength="8"></label><div class="po_abs right0 top0 wid24 tex_c bglanlvse baise trall3 fs16 cur_p" onClick="toidval(\'se|set\');selea()"><i class="fa fa-search"></i></div></div></div></a>';
$eysf = '';
$na = 0;
$sql = "select * from z_leixing where lx = '1' order by paixu + '10000' asc";
$que = mysqli_query($db,$sql);
while ($rs = mysqli_fetch_array($que))
{
    $na = $na + 1;
    $id = $rs['id'];
    $eysf .= '<a id="ysf' . $na . '" href="javascript:;" onClick="toval(\'sf|' . $id . ',sfn|' . $na . ',sft|\');setar(\'tag-sm tag-cloud\',\'\',\'ysf\',' . $na . ',\'showdiv\');selea()">' . stripcslashes($rs['title']) . '</a>';
}
$na = $na + 1;
$eysf .= '<a id="ysf' . $na . '" href="javascript:;" onClick="toval(\'sfn|' . $na . '\');setar(\'dnone\',\'\',\'ysf\',' . $na . ',\'\');setar(\'\',\'dnone\',\'ysfa\',' . $na . ',\'\')">&gt;&gt;</a>
<a href="javascript:;" class="po_abs"><div id="ysfa' . $na . '" class="left po_rel top-3 dnone"><div class="wid10 left hig22 ov_hid"></div><div class="po_abs left0 top0 wid100 hig24 lh24 ov_hid"><label class="left"><input id="sft" type="text" class="left wid95 hig24 padl3 padr2 lh24 bor0 baise fs12 bghuise2" value="" maxlength="8"></label><div class="po_abs right0 top0 wid24 tex_c bglanlvse baise trall3 fs16 cur_p" onClick="toidval(\'sf|sft\');selea()"><i class="fa fa-search"></i></div></div></div></a>';

$eysh = '';
$na = 0;
$sql = "select * from z_leixing where lx = '8' order by paixu + '10000' asc";
$que = mysqli_query($db,$sql);
while ($rs = mysqli_fetch_array($que))
{
    $na = $na + 1;
    $id = $rs['id'];
    $eysh .= '<a id="ysh' . $na . '" href="javascript:;" onClick="toval(\'sh|' . $id . ',shn|' . $na . ',sht|\');selea()">' . stripcslashes($rs['title']) . '</a>';
}
$na = $na + 1;
$eysh .= '<a id="ysh' . $na . '" href="javascript:;" onClick="toval(\'shn|' . $na . '\');setar(\'tag-sm tag-time\',\'\',\'ysh\',' . $na . ',\'\');setar(\'dnone\',\'\',\'ysh\',' . $na . ',\'\');setar(\'\',\'dnone\',\'ysha\',' . $na . ',\'\')">&gt;&gt;</a>
<a href="javascript:;" class="po_abs"><div id="ysha' . $na . '" class="left po_rel top-3 dnone"><div class="wid10 left hig22 ov_hid"></div><div class="po_abs left0 top0 wid100 hig24 lh24 ov_hid"><label class="left"><input id="sht" type="text" class="left wid95 hig24 padl3 padr2 lh24 bor0 baise fs12 bghuise2" value="" maxlength="8"></label><div class="po_abs right0 top0 wid24 tex_c bglanlvse baise trall3 fs16 cur_p" onClick="toidval(\'sh|sht\');selea()"><i class="fa fa-search"></i></div></div></div></a>';


$lx1id = '';
$leixing1 = '';
$leixing2 = '';
$leixing3 = '';
$sql = "select * from z_leixing where lx = '1' order by paixu + '10000' asc";
$que = mysqli_query($db,$sql);
while ($rs = mysqli_fetch_array($que))
{
    $lx1id .= $rs['id'] . '|';
    $leixing1 .= $rs['title'] . '|';
    $leixing2 .= $rs['ciku'] . '|';
    $leixing3 .= $rs['paixu'] . '|';
}
$lx1id = rtrim($lx1id, "|");
$leixing1 = rtrim($leixing1, "|");
$leixing2 = rtrim($leixing2, "|");
$leixing3 = rtrim($leixing3, "|");
$arr1x = explode("|", $lx1id);
$arra = explode("|", $leixing1);
$arrb = explode("|", $leixing2);
$arrc = explode("|", $leixing3);
$arr1xre = array_reverse($arr1x);
$lx1idre = implode("|", $arr1xre);
$arrare = array_reverse($arra);
$leixing1re = implode("|", $arrare);
$arrbre = array_reverse($arrb);
$leixing2re = implode("|", $arrbre);
$arrcre = array_reverse($arrc);
$leixing3re = implode("|", $arrcre);
$numa = count($arra);

$lx6a = '';
$lx6b = '';
$sql = "select * from z_leixing where lx = '6' order by paixu + '10000' asc";
$que = mysqli_query($db,$sql);
while ($rs = mysqli_fetch_array($que))
{
    $lx6a .= $rs['title'] . '|';
    $lx6b .= $rs['ciku'] . '|';
}
$arr6a = explode("|", $lx6a);
$arr6b = explode("|", $lx6b);
$num6a = count($arr6a) - 1;

$leixing5 = '';
$sql = "select * from z_leixing where lx = '5' order by paixu + '10000' asc";
$que = mysqli_query($db,$sql);
while ($rs = mysqli_fetch_array($que))
{
    $leixing5 .= stripcslashes($rs['ciku']) . '|';
}
$arre = explode("|", $leixing5);
$nume = count($arre) - 1;

$rurl = urldecode($_SERVER['REQUEST_URI']);
$arrrua = explode("?", $rurl);
$alls = trim($arrrua[1]);
$alls = str_replace('&amp;', '&', $alls);
if ($alls != "")
{
    $arrrub = explode("&", $alls);
    $numrub = count($arrrub);
    for ($i = 0; $i < $numrub; $i++)
    {
        $va = trim($arrrub[$i]);
        if ($va != "")
        {
            $arrruba = explode("=", $va);
            $varua = addslashes(stripcslashes(strip_tags(trim($arrruba[0]))));
            $varub = addslashes(stripcslashes(strip_tags(trim($arrruba[1]))));
            if ($varua == "sb")
            {
                $sb = $varub;
            }
            if ($varua == "sc")
            {
                $sc = $varub;
            }
            if ($varua == "sd")
            {
                $sd = $varub;
            }
            if ($varua == "se")
            {
                $se = $varub;
            }
            if ($varua == "sf")
            {
                $sf = $varub;
            }
            if ($varua == "sg")
            {
                $sg = $varub;
            }
            if ($varua == "sh")
            {
                $sh = $varub;
            }
            if ($varua == "page")
            {
                $page = $varub;
            }
        }
    }
}
$pagenum = 16;
$page = intval($page);
if ($page < 1)
{
    $page = 1;
}
$start_limit = ($page - 1) * $pagenum;

$tja = "";
if ($yingshishow == 2)
{
    $tja .= " and trtime > '0' ";
}
$tjf = "";
if ($sa == "")
{
    $sa = 1;
}
if ($sb != "")
{
    $tja .= " and (title like '%$sb%' or daoyan like '%$sb%' or bianji like '%$sb%' or yanyuan like '%$sb%') ";
}
if ($sc != "")
{
    $tja .= " and fenlei like '%$sc%' ";
}
if ($sd != "")
{
    $sql = mysqli_query($db,"select * from z_leixing where id = '$sd' or (lx = '3' and ciku like '%$sd%') order by paixu + '10000' asc limit 0,1");
    $rs = mysqli_fetch_array($sql);
    if ($rs['id'] > 0)
    {
        $lva = $rs['title'];
        $ciku = $rs['ciku'];
        $arr = explode("@", $ciku);
        $lvb = $arr[1];
        $lvb = ltrim(rtrim($lvb, ","), ",");
        $arr = explode(",", $lvb);
        $num = count($arr);
        $na = 0;
        $tjb = "";
        for ($i = 0; $i < $num; $i++)
        {
            $na = $na + 1;
            $lvbv = trim($arr[$i]);
            if ($lvbv != "")
            {
                $tjb .= " or diqu = '$lvbv' ";
            }
        }
        $tja .= " and (diqu like '%$lva%' $tjb )";
    }
    else
    {
        $tja .= " and diqu like '%$sd%' )";
    }
}
if ($se != "")
{
    $sql = mysqli_query($db,"select * from z_leixing where id = '$se'");
    $rs = mysqli_fetch_array($sql);
    $lva = $rs['title'];
    $ciku = $rs['ciku'];
    $arr = explode("@", $ciku);
    $lvb = $arr[1];
    $arr = explode("-", $lvb);
    $lvba = intval($arr[0]);
    $lvbb = intval($arr[1]);
    $na = 0;
    $tjb = "";
    $lvbc = $lvba + $lvbb;
    if ($lvbc > 0)
    {
        $tjb = " or (niandai >= '$lvba' and niandai <= '$lvbb')";
    }
    $tja .= " and (niandai = '$se' or niandai = '$lva' $tjb )";
}
if ($sf != "")
{
    $sql1 = mysqli_query($db,"select * from z_leixing where (id = '$sf' or ciku like '%$sf%') and lx = '1' order by paixu + '10000' asc limit 1");
    $rs1 = mysqli_fetch_array($sql1);
    if ($rs1['id'] > 0)
    {
        $paixu1 = $rs1['paixu'];
        $sfv = $rs1['title'];
        $ciku1 = $rs1['ciku'];
        $arrfb = explode("@", $ciku1);
        $numfb = count($arrfb);
        $na = 0;
        for ($i = 0; $i < $numfb; $i++)
        {
            $vf = trim($arrfb[$i]);
            $na = $na + 1;
            if ($na > 1)
            {
                $nc = 0;
                $arrfc = explode(",", $vf);
                $numfc = count($arrfc);
                $tjfb = "";
                for ($j = 0; $j < $numfc; $j++)
                {
                    $lxfc = trim($arrfc[$j]);
                    if ($lxfc != "")
                    {
                        $nc = $nc + 1;
                        if ($nc == 1)
                        {
                            $tjfb .= " zname like '%$lxfc%' ";
                        }
                        else
                        {
                            $tjfb .= " and zname like '%$lxfc%' ";
                        }
                    }
                }
                if ($tjfb != "")
                {
                    if ($na == 2)
                    {
                        $tjf .= " ( $tjfb ) ";
                    }
                    else
                    {
                        $tjf .= " or ( $tjfb ) ";
                    }
                }
            }
        }
        if ($tjf != "")
        {
            $tjf = " and ( qingxidu = '$sfv' or ( $tjf ) ) ";
        }
    }
    else
    {
//$tjf = " and zname like '%$sf%' ";	
    }
    if ($tjf != "")
    {
        $tjfa = '';
        $nc = 0;
        $sql = "select * from z_zhongzi where lx = '$sa' $tjf group by yid order by id desc limit $start_limit,200";
        $que = mysqli_query($db,$sql);
        while ($rs = mysqli_fetch_array($que))
        {
            $id1 = $rs['yid'];
            $znamea = "," . mb_strtolower($rs['zname'], 'utf8') . ",";
            $opa = 1;
            for ($i = 0; $i < $numa; $i++)
            {
                $lvrb = $arrbre[$i];
                $lvrc = $arrcre[$i];
                $arrrb = explode("@", $lvrb);
                $numrb = count($arrrb);
                for ($j = 0; $j < $numrb; $j++)
                {
                    $lvrba = trim($arrrb[$j]);
                    if ($lvrba != "")
                    {
                        $lvrba = mb_strtolower($lvrba, 'utf8');
                        $arrrba = explode(",", $lvrba);
                        $numrba = count($arrrba);
                        $lvrbainc = 1;
                        for ($k = 0; $k < $numrba; $k++)
                        {
                            $lvrbaa = trim($arrrba[$k]);
                            if (strpos($znamea, $lvrbaa) == false)
                            {
                                $lvrbainc = 2;
                            }
                        }
                        if ($lvrbainc == 1)
                        {
                            if ($lvrc > $paixu1)
                            {
                                $opa = 2;
                            }
                        }
                    }
                }
            }
            if ($opa == 1)
            {
                $nc = $nc + 1;
                $tjfa .= ",'$id1'";
            }
        }
        $tjfa = ltrim($tjfa, ",");
        if ($nc == 1)
        {
            $tja .= " and id = $tjfa ";
        }
        if ($nc > 1)
        {
            $tja .= " and id in ( $tjfa )";
        }
    }
    if ($nc < 1)
    {
        $tja .= " and id = '0' ";
    }
}
if ($sh != "")
{
    $sql = mysqli_query($db,"select * from z_leixing where id = '$sh' or (lx = '8' and ciku like '%$sh%') order by paixu + '10000' asc limit 0,1");
    $rs = mysqli_fetch_array($sql);
    if ($rs['id'] > 0)
    {
        $lva = $rs['title'];
        $ciku = $rs['ciku'];
        $arr = explode("@", $ciku);
        $lvb = $arr[1];
        $lvb = ltrim(rtrim($lvb, ","), ",");
        $arr = explode(",", $lvb);
        $num = count($arr);
        $na = 0;
        $tjb = "";
        for ($i = 0; $i < $num; $i++)
        {
            $na = $na + 1;
            $lvbv = trim($arr[$i]);
            if ($lvbv != "")
            {
                $tjb .= " or biaoqian like '%$lvbv%' ";
            }
        }
        $tja .= " and (biaoqian like '%$lva%' $tjb )";
    }
    else
    {
        $tja .= " and biaoqian like '%$sh%' )";
    }
}
$px = " order by trtime desc ";
if ($sg == 2)
{
    $px = " order by doubanfen + '1000' desc";
}
if ($sg == 3)
{
    $px = " order by addtime desc";
}
$sqlt = mysqli_query($db,"select count(*) as sla from z_yingshi where lx = '$sa' $tja");
$rst = mysqli_fetch_array($sqlt);
$sla = $rst['sla'];
$pages = ceil(($sla / $pagenum));
$fya = 10;
$fya2 = intval(($fya / 2));
$fenye = '';
$fenyea = '';
$fenyeb = '';
if ($pages > 1)
{
    $fyb = $page - $fya2;
    $page1 = $page - 1;
    if ($fyb < 0)
    {
        $fyb = 0;
    }
    if ($fyb > 0)
    {
        $fenyea = '<li><a class="num" href="javascript:;" onclick="selepage(\'1\');todiva(\'showdiv|\');">1...</a></li>';
    }
    if ($page1 > 0)
    {
        $fenyea .= '<li><a class="num" href="javascript:;" onclick="selepage(\'' . $page1 . '\');todiva(\'showdiv|\');">&lt;</a></li>';
    }
    $fyc = $page + $fya2;
    $fyca = $pages - $fyc;
    if ($fyc > $pages)
    {
        $fyc = $pages;
    }
    $page2 = $page + 1;
    $fyc3 = $pages;
    if ($page < $pages)
    {
        $fenyeb .= '<li><a class="num" href="javascript:;" onclick="selepage(\'' . $page2 . '\');todiva(\'showdiv|\');">&gt;</a></li>';
    }
    if ($fyca > 0)
    {
        $fenyeb .= '<li><a class="num" href="javascript:;" onclick="selepage(\'' . $fyc3 . '\');todiva(\'showdiv|\');">...' . $fyc3 . '</a></li>';
    }
    $fnum = $fyc - $fyb;
    for ($i = 0; $i < $fnum; $i++)
    {
        $fyb = $fyb + 1;
        if ($fyb == $page)
        {
            $fenye .= '<li class="active"><span class="current">' . $fyb . '</span></li>';
        }
        else
        {
            $fenye .= '<li><a class="num" href="javascript:;" onclick="selepage(\'' . $fyb . '\');todiva(\'showdiv|\');">' . $fyb . '</a></li>';
        }
    }
}
if ($fenye != "")
{
    $fenye = $fenyea . $fenye . $fenyeb;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title><?php echo stripcslashes($sitename); ?></title>
    <link rel="shortcut icon" href="../upload/site/<?php echo $siteicon; ?>"/>
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="../css/main.css" rel="stylesheet" type="text/css">
    <link href="../css/custom.css" rel="stylesheet" type="text/css">
    <link href="../css/cssa.css" rel="stylesheet" type="text/css">
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/ajs.js"></script>
    <script type="text/javascript">
        function selea() {
            var sb = document.getElementById("sb").value;
            var sc = document.getElementById("sc").value;
            var sct = document.getElementById("sct").value;
            var scn = document.getElementById("scn").value;
            var sd = document.getElementById("sd").value;
            var sdt = document.getElementById("sdt").value;
            var sdn = document.getElementById("sdn").value;
            var se = document.getElementById("se").value;
            var set = document.getElementById("set").value;
            var sen = document.getElementById("sen").value;
            var sf = document.getElementById("sf").value;
            var sft = document.getElementById("sft").value;
            var sfn = document.getElementById("sfn").value;
            var sg = document.getElementById("sg").value;
            var sh = document.getElementById("sh").value;
            var sht = document.getElementById("sht").value;
            var shn = document.getElementById("shn").value;
            window.location.href = '?sb=&sc=' + sc + '&sct=' + sct + '&scn=' + scn + '&sd=' + sd + '&sdt=' + sdt + '&sdn=' + sdn + '&se=' + se + '&set=' + set + '&sen=' + sen + '&sf=' + sf + '&sft=' + sft + '&sfn=' + sfn + '&sg=' + sg + '&sh=' + sh + '&sht=' + sht + '&shn=' + shn;
        }

        function selepage(page) {
            var page = page;
            var sb = document.getElementById("sb").value;
            var sc = document.getElementById("sc").value;
            var sct = document.getElementById("sct").value;
            var scn = document.getElementById("scn").value;
            var sd = document.getElementById("sd").value;
            var sdt = document.getElementById("sdt").value;
            var sdn = document.getElementById("sdn").value;
            var se = document.getElementById("se").value;
            var set = document.getElementById("set").value;
            var sen = document.getElementById("sen").value;
            var sf = document.getElementById("sf").value;
            var sft = document.getElementById("sft").value;
            var sfn = document.getElementById("sfn").value;
            var sg = document.getElementById("sg").value;
            var sh = document.getElementById("sh").value;
            var sht = document.getElementById("sht").value;
            var shn = document.getElementById("shn").value;
            window.location.href = '?sb=&sc=' + sc + '&sct=' + sct + '&scn=' + scn + '&sd=' + sd + '&sdt=' + sdt + '&sdn=' + sdn + '&se=' + se + '&set=' + set + '&sen=' + sen + '&sf=' + sf + '&sft=' + sft + '&sfn=' + sfn + '&sg=' + sg + '&sh=' + sh + '&sht=' + sht + '&shn=' + shn + '&page=' + page;
        }
    </script>
</head>

<body>
<?php require_once('./inc/topi.php'); ?>
<div class="background-overlay  hidden-xs hidden-sm"></div>
<div class="main-container">
    <section class="imagebg bg--dark" style="padding-bottom: 3em">
        <div class="background-image-holder"
             style="background: url(<?php echo $bgimgurl; ?>); opacity: 1; height: 700px;">
            <img alt="background" src="<?php echo $bgimgurl; ?>">
        </div>
        <!--end of container-->

        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12  hidden-sm hidden-xs"
                     style="margin-bottom: 2em;background: rgba(37, 37, 37, 0.32);border-radius: 10px;">
                    <div class="container">
                        <div class="row">
                            <div class="jumbotron masthead">
                                <input id="adc" type="text" value="yingshi" class="dnone"><input id="sa" type="text"
                                                                                                 value="<?php echo $sa; ?>"
                                                                                                 class="dnone"><input
                                        id="sc" type="text" value="" class="dnone"><input id="sd" type="text" value=""
                                                                                          class="dnone"><input id="se"
                                                                                                               type="text"
                                                                                                               value=""
                                                                                                               class="dnone"><input
                                        id="sf" type="text" value="" class="dnone"><input id="sg" type="text" value=""
                                                                                          class="dnone"><input id="sh"
                                                                                                               type="text"
                                                                                                               value=""
                                                                                                               class="dnone"><input
                                        id="sg" type="text" value="1" class="dnone"><input id="page" type="text"
                                                                                           value="<?php echo $page; ?>"
                                                                                           class="dnone"><input
                                        id="pagenum" type="text" value="16" class="dnone"><input id="scn" type="text"
                                                                                                 value="" class="dnone"><input
                                        id="sdn" type="text" value="" class="dnone"><input id="sen" type="text" value=""
                                                                                           class="dnone"><input id="sfn"
                                                                                                                type="text"
                                                                                                                value=""
                                                                                                                class="dnone"><input
                                        id="shn" type="text" value="" class="dnone">
                                <div class="typebox">
                                    <dl class="prel hidden-sm hidden-xs">
                                        <dt>影视类型:</dt>
                                        <dd><a id="ysa0" href="javascript:;"
                                               onClick="toval('sc|,scn|0,sct|');setar('tag-sm tag-type','','ysa',0,'showdiv');selea()"
                                               class="tag-sm tag-type">不限</a> <?php echo $eysa; ?> </dd>
                                    </dl>
                                    <dl class="prel hidden-sm hidden-xs">
                                        <dt>制片地区:</dt>
                                        <dd><a id="ysb0" href="javascript:;"
                                               onClick="toval('sd|,sdn|0,sdt|');setar('tag-sm tag-time','','ysb',0,'showdiv');selea()"
                                               class="tag-sm tag-time">不限</a> <?php echo $eysb; ?> </dd>
                                    </dl>
                                    <dl class="prel hidden-sm hidden-xs">
                                        <dt>上映年份:</dt>
                                        <dd><a id="ysc0" href="javascript:;"
                                               onClick="toval('se|,sen|0,set|');setar('tag-sm tag-size','','ysc',0,'showdiv');selea()"
                                               class="tag-sm tag-size">不限</a> <?php echo $eysc; ?> </dd>
                                    </dl>
                                    <dl class="prel hidden-sm hidden-xs">
                                        <dt>资源画质:</dt>
                                        <dd><a id="ysf0" href="javascript:;"
                                               onClick="toval('sf|,sfn|0,sft|');setar('tag-sm tag-cloud','','ysf',0,'showdiv');selea()"
                                               class="tag-sm tag-cloud">不限</a> <?php echo $eysf; ?> </dd>
                                    </dl>
                                    <dl class="prel hidden-sm hidden-xs">
                                        <dt>影视标签:</dt>
                                        <dd><a id="ysh0" href="javascript:;"
                                               onClick="toval('sh|,shn|0,sht|');setar('tag-sm tag-picture','','ysh',0,'showdiv');selea()"
                                               class="tag-sm tag-time">不限</a> <?php echo $eysh; ?> </dd>
                                    </dl>
                                    <dl class="prel type--bold">
                                        <dt>影视排序:</dt>
                                        <dd><a id="ysd1" href="javascript:;"
                                               onClick="toval('sg|1');setar('tag-sm tag-picture2','','ysd',1,'showdiv');selea()"
                                               class="tag-sm tag-picture2">资源更新时间</a><a id="ysd2" href="javascript:;"
                                                                                        onClick="toval('sg|2');setar('tag-sm tag-picture2','','ysd',2,'showdiv');selea()"
                                                                                        class="">豆瓣评分</a><a id="ysd3"
                                                                                                            href="javascript:;"
                                                                                                            onClick="toval('sg|3');setar('tag-sm tag-picture2','','ysd',3,'showdiv');selea()"
                                                                                                            class="">资料添加时间</a>
                                        </dd>
                                    </dl>
                                </div>

                            </div>

                        </div>
                        <!--end of row-->
                    </div>

                </div>
                <div id="showdiv" class="col-sm-12 text-center">
                    <div class="col-md-12">
                        <div class="masonry masonry-demos">
                            <div class="masonry_container masonry--active">
                                <?php
                                $na = 0;
                                $sql = "select * from z_yingshi where lx = '$sa' $tja $px limit $start_limit,$pagenum";
                                $que = mysqli_query($db,$sql);
                                while ($rs = mysqli_fetch_array($que))
                                {
                                    $id = $rs['id'];
                                    $opa = 1;
                                    $lx = $rs['lx'];

                                    if ($opa == 1)
                                    {
                                        $na = $na + 1;
                                        $eqxd = '';
                                        $zqxd = '';
                                        $elx6 = '';
                                        for ($m = 0; $m < $num6a; $m++)
                                        {
                                            $v6a = trim($arr6a[$m]);
                                            $v6b = trim($arr6b[$m]);
                                            $arrv6b = explode(",", $v6b);
                                            $numv6b = count($arrv6b);
                                            for ($n = 0; $n < $numv6b; $n++)
                                            {
                                                $v6bb = trim($arrv6b[$n]);
                                                if ($v6bb != "")
                                                {
                                                    for ($i = 0; $i < $numa; $i++)
                                                    {
                                                        $lx1d = trim($arr1x[$i]);
                                                        $lxva = trim($arra[$i]);
                                                        $lxvb = trim($arrb[$i]);
                                                        if ($v6bb == $lx1d)
                                                        {
                                                            if ($lxva != "")
                                                            {
                                                                $arrbb = explode("@", $lxvb);
                                                                $numb = count($arrbb);
                                                                $nb = 0;
                                                                $tjb = "";
                                                                $tjc = "";
                                                                for ($j = 0; $j < $numb; $j++)
                                                                {
                                                                    $lxvbb = trim($arrbb[$j]);
                                                                    $nb = $nb + 1;
                                                                    if ($nb > 1)
                                                                    {
                                                                        $nc = 0;
                                                                        $arrbc = explode(",", $lxvbb);
                                                                        $numc = count($arrbc);

                                                                        for ($k = 0; $k < $numc; $k++)
                                                                        {
                                                                            $lxvbc = trim($arrbc[$k]);
                                                                            if ($lxvbc != "")
                                                                            {
                                                                                $nc = $nc + 1;
                                                                                if ($nc == 1)
                                                                                {
                                                                                    $tjc .= " or ( zname like '%$lxvbc%' ";
                                                                                }
                                                                                else
                                                                                {
                                                                                    $tjc .= " and zname like '%$lxvbc%' ";
                                                                                }
                                                                                if ($nc == $numc)
                                                                                {
                                                                                    $tjc .= " ) ";
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }

                                                                if ($zqxd == "")
                                                                {
                                                                    if ($tjc != "")
                                                                    {
                                                                        $sqlz = mysqli_query($db,"select * from z_zhongzi where yid = '$id' and ((qingxidu = '$lxva') $tjc ) order by id desc limit 1");
                                                                        $rsz = mysqli_fetch_array($sqlz);
                                                                        if ($rsz['id'] > 0)
                                                                        {
                                                                            $zqxd = $v6a;
                                                                            $elx6 .= $lx1d . '|';
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                        $tjc = "";
                                                    }
                                                }
                                            }
                                        }

                                        if (trim($zqxd) != "")
                                        {
                                            $eqxd = '<div class="inblock padl12 padr12 padt6 padb6 lh16">' . $zqxd . '</div>';
                                        }
                                        $ejs = '';
                                        if ($lx == 2)
                                        {
                                            $sql1 = mysqli_query($db,"select * from z_zhongzi where yid = '$id' and tp = '2' ");
                                            $rs1 = mysqli_fetch_array($sql1);
                                            if ($rs1['id'] > 0)
                                            {
                                                $ejs = '<div class="inblock padl12 padr12 padt6 padb6 lh16">全集</div>';
                                            }
                                            else
                                            {
                                                $sql1 = mysqli_query($db,"select * from z_zhongzi where yid = '$id' order by right(jishu,2) + '10000' desc limit 0,1");
                                                $rs1 = mysqli_fetch_array($sql1);
                                                if (trim($rs1['jishu']) != "")
                                                {
                                                    $jishu = trim($rs1['jishu']);
                                                    $arrjs = explode(",", $jishu);
                                                    $numjs = count($arrjs);
                                                    $numjsa = $numjs - 1;
                                                    if ($numjs < 2)
                                                    {
                                                        $ejishu = intval($jishu);
                                                    }
                                                    if ($numjs > 1)
                                                    {
                                                        $ejishu = intval($arrjs[$numjsa]);
                                                    }
                                                    if ($ejishu == intval($rs['quanji']))
                                                    {
                                                        $ejs = '<div class="inblock padl12 padr12 padt6 padb6 lh16">全集</div>';
                                                    }
                                                    else
                                                    {
                                                        if(preg_match('/全(\d+)集/',$rs1['zname'], $data))
                                                        {
                                                            $ejs = '<div class="inblock padl12 padr12 padt6 padb6 lh16">全集</div>';
                                                        }
                                                        else
                                                        {
                                                            $ejs = '<div class="inblock padl12 padr12 padt6 padb6 lh16">更新至' . $ejishu . '集</div>';
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                        $dbf = trim($rs['doubanfen']);
										$imdbf = trim($rs['imdbfen']);
                                        $edbf = '';
                                        $edbfa = '';
                                        if ($dbf != "")
                                        {
                                            $edbf = number_format($dbf, 1);
                                            $edbfa = '<span class="tag-sm tag-picture2">' . $edbf . '</span>';
                                        }else if($imdbf != ""){
											$edbf = number_format($imdbf, 1);
											$edbfa = '<span class="tag-sm tag-picture2">' . $edbf . '</span>';
										}
                                        $plx = $rs['plx'];
                                        $pica = stripcslashes(trim($rs['pica']));
                                        $pic = $pica;
                                        if ($plx == 1)
                                        {
                                            $pic = '/upload/pic/' . $pica;
                                        }
                                        $epic = '/images/nopic.png';
                                        if ($pica != "" && $pic != 'errorheader')
                                        {
                                            $epic = $pic;
                                        }
                                        $cla = '<div class="left bf3 hig20 ov_hid"></div>';
                                        if ($na % 4 == 0)
                                        {
                                            $cla = '<div class="left bf100 hig30 ov_hid"></div>';
                                        }
                                        $aurl = $hswz . '/mv.php/' . $id . '.html';
                                        if ($sitereurl == 1)
                                        {
                                            $aurl = $hswz . '/mv/' . $id . '.html';
                                        }
                                        $ecc = '';

                                        if (trim($rs['bieming']) != "")
                                        {
                                            $bieming = stripcslashes(trim($rs['bieming']));
                                            $bmlen = mb_strlen($bieming, 'utf-8');
                                            if ($bmlen > 50)
                                            {
                                                $bieminga = mb_substr($bieming, 0, 50, 'utf-8');
                                                $bieminga = str_replace('，', ',', $bieminga);
                                                $arrbm = explode(",", $bieminga);
                                                $numbm = count($arrbm) - 1;
                                                $ebieming = '';
                                                for ($l = 0; $l < $numbm; $l++)
                                                {
                                                    $va = trim($arrbm[$l]);
                                                    if ($va != "")
                                                    {
                                                        $ebieming .= $va . ',';
                                                    }
                                                }
                                                $bieming = rtrim($ebieming, ",");
                                            }
                                            $ecc .= '又名：' . $bieming . '<br>';
                                        }
                                        if (trim($rs['fenlei']) != "")
                                        {
                                            $ecc .= '类型：' . stripcslashes($rs['fenlei']) . '<br>';
                                        }
                                        if (trim($rs['pianchang']) != "")
                                        {
                                            $ecc .= '片长：' . stripcslashes($rs['pianchang']) . '<br>';
                                        }
                                        if (trim($rs['diqu']) != "")
                                        {
                                            $ecc .= '地区：' . stripcslashes($rs['diqu']) . '<br>';
                                        }
                                        $ecc = rtrim($ecc, '<br>');

                                        if ($ejs != "")
                                        {
                                            $ejs = '<div class="po_abs left15 top0 wid100 tex_c vidiva"><div class="po_rel left lh28"><div class="po_abs left0 top0 bf100 hbf100 bghei opa4 br5 ov_hid zdx1"></div><div class="po_rel left bf100 huise2 zdx2 tex_l">' . $ejs . '</div></div></div>';
                                        }
                                        if ($eqxd != "")
                                        {
                                            $eqxd = '<div class="po_abs right15 top0 wid100 tex_c vidiva"><div class="po_rel right lh28"><div class="po_abs left0 top0 bf100 hbf100 bghei opa4 br5 ov_hid zdx1"></div><div class="po_rel left bf100 huise2 zdx2 tex_r">' . $eqxd . '</div></div></div>';
                                        }

                                        $echo = '<div class="masonry_item col-md-3 col-sm-6 col-xs-6 marb60">
 <a href="' . $aurl . '" target="_blank" class="block text-block">
  <figure class="effect-sadie">
    ' . $ejs . $eqxd . '<div class="left top0 bf100 po_rel br6 picdiv marb24"><div class="po_abs left0 top0 bf100 hbf100 br6 ov_hid bgimgcov" style="background-image:url(' . $epic . ')"></div></div>
  <figcaption>
 <h2>' . stripcslashes($rs['title']) . '<br><span>' . trim($rs['niandai']) . '</span></h2>
 <p>' . $ecc . '</p>
 <div class="left bf100 hig60 ov_hid"><h5>' . stripcslashes($rs['title']) . '<span class="type--fine-print">(' . trim($rs['niandai']) . ')</span>
 ' . $edbfa . '
 </h5></div> <em>' . $edbf . '</em> </figcaption> </figure> </a> </div>';
                                        echo $echo;
                                    }
                                }
                                ?> </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="text-center hidden-sm hidden-xs">
                            <ul class="tsc_pagination tsc_paginationA tsc_paginationA06"> <?php echo $fenye; ?> </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>


</div>
<div class="all-page-modals"></div>
<?php
require_once('./inc/adddiv.php');
require_once('./inc/botti.php');
?>
<div id="tcwxpicdiv" class="po_fix top0 zdx99 left0 bf100 hbf100 trall5 vihid">
    <div class="po_abs left0 top0 bf100 hbf100 bghei opa5 ov_hid"></div>
    <div class="po_abs topb50 leftb50 wid220 hig280 bghuise8 br5 marl-120 padt10 padb10 padl10 padr10"
         style="margin-top:-150px">
        <div class="left bf100 hig220"><?php if ($sitewxpic != "") {
                echo '<img src="' . $hswz . '/upload/site/' . $sitewxpic . '" class="left bf100" />';
            } ?></div>
        <div class="left bf100 tex_c lh14 fs12 huise mart10">扫码加入微信官方群</div>
        <div class="po_abs top-10 wid26 hig26 lh26 tex_c brb50 bghei baise cur_p fs14" style="right:-30px;"
             onClick="vihid('tcwxpicdiv')">X
        </div>
    </div>
</div>
<div id="tcqqpicdiv" class="po_fix top0 left0 zdx99 bf100 hbf100 trall5 vihid">
    <div class="po_abs left0 top0 bf100 hbf100 bghei opa5 ov_hid"></div>
    <div class="po_abs topb50 leftb50 wid220 hig280 bghuise8 br5 marl-120 padt10 padb10 padl10 padr10"
         style="margin-top:-150px">
        <div class="left bf100 hig220"><?php if ($siteqqpic != "") {
                echo '<img src="' . $hswz . '/upload/site/' . $siteqqpic . '" class="left bf100" />';
            } ?></div>
        <div class="left bf100 tex_c lh14 fs12 huise mart10">扫码加入QQ官方群</div>
        <div class="po_abs top-10 wid26 hig26 lh26 tex_c brb50 bghei baise cur_p fs14" style="right:-30px;"
             onClick="vihid('tcqqpicdiv')">X
        </div>
    </div>
</div>
<script type="text/javascript" src="../js/bundle.min.js"></script>
<script type="text/javascript">
    var sg = GetUrlParam("sg");
    if (sg < 1 || isNaN(sg)) {
        var sg = 1;
    }
    document.getElementById("sc").value = GetUrlParam("sc");
    document.getElementById("sd").value = GetUrlParam("sd");
    document.getElementById("se").value = GetUrlParam("se");
    document.getElementById("sf").value = GetUrlParam("sf");
    document.getElementById("sg").value = sg;
    document.getElementById("sh").value = GetUrlParam("sh");
    document.getElementById("scn").value = GetUrlParam("scn");
    document.getElementById("sdn").value = GetUrlParam("sdn");
    document.getElementById("sen").value = GetUrlParam("sen");
    document.getElementById("sfn").value = GetUrlParam("sfn");
    document.getElementById("shn").value = GetUrlParam("shn");
    document.getElementById("sct").value = decodeURI(GetUrlParam("sct"));
    document.getElementById("sdt").value = decodeURI(GetUrlParam("sdt"));
    document.getElementById("set").value = decodeURI(GetUrlParam("set"));
    document.getElementById("sft").value = decodeURI(GetUrlParam("sft"));
    document.getElementById("sht").value = decodeURI(GetUrlParam("sht"));
    var sct = document.getElementById("sct").value;
    var sdt = document.getElementById("sdt").value;
    var set = document.getElementById("set").value;
    var sft = document.getElementById("sft").value;
    var sht = document.getElementById("sht").value;
    document.getElementById("page").value = GetUrlParam("page");
    var scn = document.getElementById("scn").value;
    var sdn = document.getElementById("sdn").value;
    var sen = document.getElementById("sen").value;
    var sfn = document.getElementById("sfn").value;
    var shn = document.getElementById("shn").value;
    for (i = 0; i < 100; i++) {
        var divid = "ysa" + i;
        if (document.getElementById(divid)) {
            if (i == scn) {
                $("#" + divid).addClass("tag-sm tag-type");
            } else {
                $("#" + divid).removeClass("tag-sm tag-type");
            }
        }
    }
    for (i = 0; i < 100; i++) {
        var divid = "ysb" + i;
        if (document.getElementById(divid)) {
            if (i == sdn) {
                $("#" + divid).addClass("tag-sm tag-time");
            } else {
                $("#" + divid).removeClass("tag-sm tag-time");
            }
        }
    }
    for (i = 0; i < 100; i++) {
        var divid = "ysc" + i;
        if (document.getElementById(divid)) {
            if (i == sen) {
                $("#" + divid).addClass("tag-sm tag-size");
            } else {
                $("#" + divid).removeClass("tag-sm tag-size");
            }
        }
    }
    for (i = 0; i < 100; i++) {
        var divid = "ysd" + i;
        if (document.getElementById(divid)) {
            if (i == sg) {
                $("#" + divid).addClass("tag-sm tag-picture2");
            } else {
                $("#" + divid).removeClass("tag-sm tag-picture2");
            }
        }
    }
    for (i = 0; i < 100; i++) {
        var divid = "ysf" + i;
        if (document.getElementById(divid)) {
            if (i == sfn) {
                $("#" + divid).addClass("tag-sm tag-cloud");
            } else {
                $("#" + divid).removeClass("tag-sm tag-cloud");
            }
        }
    }
    for (i = 0; i < 100; i++) {
        var divid = "ysh" + i;
        if (document.getElementById(divid)) {
            if (i == shn) {
                $("#" + divid).addClass("tag-sm tag-time");
            } else {
                $("#" + divid).removeClass("tag-sm tag-time");
            }
        }
    }
    if (sct != "") {
        var diva = "ysa" + scn;
        var va = diva + "|" + sct;
        todiva(va)
    }
    if (sdt != "") {
        var diva = "ysb" + sdn;
        var va = diva + "|" + sdt;
        todiva(va)
    }
    if (set != "") {
        var diva = "ysc" + sen;
        var va = diva + "|" + set;
        todiva(va)
    }
    if (sft != "") {
        var diva = "ysf" + sfn;
        var va = diva + "|" + sft;
        todiva(va)
    }
    if (sht != "") {
        var diva = "ysh" + shn;
        var va = diva + "|" + sht;
        todiva(va)
    }
    //selesear();
</script>
</body>
</html>