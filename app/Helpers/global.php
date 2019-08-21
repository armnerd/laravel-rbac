<?php

if (!function_exists('whoami')) {
    /**
     * 获取登录用户信息
     */
    function whoami()
    {
        return session('user');
    }
}

if (!function_exists('getPages')) {
    /**
     * 获取页签
     */
    function getPages($list, $path)
    {
        //获取query参数，过滤page与per_page
        $query_string = explode('&', $_SERVER['QUERY_STRING']);
        foreach ($query_string as $key => $value) {
            if (strstr($value, 'page=') !== false || strstr($value, 'per_page=') !== false) {
                unset($query_string[$key]);
            }
        }
        $query_string = implode('&', $query_string);
        if ($query_string) {
            $query_string = '&' . $query_string;
        }

        //单页条数
        $per_page = isset($_GET['per_page']) ? $_GET['per_page'] : 10;
        //对象转数组
        if (is_object($list)) {
            $list = $list->toArray();
        }
        $current = $list['current_page'];
        $last  = $list['current_page'];
        $total = $list['last_page'];
        $pages = [];
        if ($total <= 7) {
            for ($i=1; $i <= $total; $i++) {
                $pages[] = $i;
            }
        } else {
            if ($current >= 4) {
                $pages[] = $current - 3;
                $pages[] = $current - 2;
                $pages[] = $current - 1;
                $pages[] = $current;
            } else {
                for ($i=1; $i <= $current; $i++) {
                    $pages[] = $i;
                }
            }
            $remain = 7 - count($pages);
            for ($i=1; $i <= $remain; $i++) {
                if ($last < $total) {
                    $last += 1;
                    $pages[] = $last;
                }
            }
        }

        $html = '<div class="row">
          <div class="col-sm-7">
            <div class="dataTables_paginate paging_simple_numbers">
              <ul class="pagination">
                <li class="paginate_button previous">
                  <a href="'.$list['first_page_url'].'&per_page='.$per_page.''.$query_string.'">首页</a>
                </li>';

        foreach ($pages as $key => $value) {
            if ($list['current_page'] == $value) {
                $html .= '<li class="paginate_button active">
                  <a href="'.$path.'?page='.$value.'&per_page='.$per_page.''.$query_string.'">'.$value.'</a>
                </li>';
            } else {
                $html .= '<li class="paginate_button">
                  <a href="'.$path.'?page='.$value.'&per_page='.$per_page.''.$query_string.'">'.$value.'</a>
                </li>';
            }
        }

        $html .= '<li class="paginate_button next">
                  <a href="'.$list['last_page_url'].'&per_page='.$per_page.''.$query_string.'">尾页</a>
                </li>
              </ul>
            </div>
          </div>
        </div>';
        return $html;
    }
}
