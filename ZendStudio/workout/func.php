<?php
function getSortBy($sort)
switch($sort) {
    case'date':
        $orderby='order_date';
        break;
    case'status':
         $orderby='order_status';
         break;
    case'amount':
         $orderby='amount';
         break;
    case'customer':
         $orderby='last_name';
         break;
    default:
        $orderby='id';
}