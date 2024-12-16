<?php
// $data['title'] = 'danh sach nguoi dung';
// $data['content'] = 'nội dung';

$title = 'danh sach nguoi dung';
$content  = 'nội dung';

$listUsers= [
    'nguoi dung 1',
    'nguoi dung 2',
    'nguoi dung 3',
];

$pageTitle = 'quan ly nguoi dung';
render('lists', compact('title','content','listUsers','pageTitle'));
