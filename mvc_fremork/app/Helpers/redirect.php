<?php
class redirect{
    static public function To($PATH){
        header("location:".BASE_URL.$PATH);
    }
}