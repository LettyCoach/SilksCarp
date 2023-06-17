<?php

namespace App\Models;

class Common
{

    public static function makePagination($page, $pageSize, $totalCnt, $rowCnt)
    {

        $pageCnt = ceil($totalCnt / $pageSize);

        $rlt = "";
        $stNo = ($page - 1) * $pageSize + 1;
        $edNo = $stNo + $rowCnt - 1;

        $rlt .= "<div class='d-flex justify-content-start'>";
        $rlt .= $totalCnt > 0 ? "$totalCnt エントリ中 $stNo から $edNo を表示" : "表示するデータはありません。";
        $rlt .= "</div>";

        $rlt .= "<ul class='pagination justify-content-end'>";

        $beforePage = $page - 1;
        $nextPage = $page + 1;


        $styleFirst = "disabled";
        $styleBefore = "disabled";
        $styleNext = "disabled";
        $styleLast = "disabled";

        if ($page > 1) {
            $styleFirst = "";
            $styleBefore = "";
        }
        if ($pageCnt >= $page + 1) {
            $styleNext = "";
            $styleLast = "";
        }

        $rlt .= "<li class='page-item $styleFirst '>";
        $rlt .= "<a href='javascript:;viewDataTable(1)' class='page-link'>初め</a>";
        $rlt .= "</li>";

        $rlt .= "<li class='page-item $styleBefore'>";
        $rlt .= "<a href='javascript:;viewDataTable( $beforePage )' class='page-link'>前へ</a>";
        $rlt .= "</li>";

        for ($i = 1; $i <= $pageCnt; $i++) {

            if ($i < $page && $i > 2) {
                continue;
            }


            if ($i > $page && $i <= $pageCnt - 2) {
                continue;
            }

            if ($i == $page && $i >= 4) {

                $rlt .= "<li class='page-item'>";
                $rlt .= "<a href='javascript:;' class='page-link'>...</a>";
                $rlt .= "</li>";
            }

            $style = "";
            if ($i == $page)
                $style = "active";

            $rlt .= "<li class='page-item'>";
            $rlt .= "<a href='javascript:;viewDataTable( $i )' class='page-link $style'> $i </a>";
            $rlt .= "</li>";

            if ($i == $page && $pageCnt - $i >= 3) {

                $rlt .= "<li class='page-item'>";
                $rlt .= "<a href='javascript:;' class='page-link'>...</a>";
                $rlt .= "</li>";
            }
        }

        $rlt .= "<li class='page-item $styleNext '>";
        $rlt .= "<a href='javascript:;viewDataTable( $nextPage )' class='page-link'>次に</a>";
        $rlt .= "</li>";

        $rlt .= "<li class='page-item $styleLast '>";
        $rlt .= "<a href='javascript:;viewDataTable( $pageCnt )' class='page-link'>初め</a>";
        $rlt .= "</li>";

        return $rlt;
    }
}