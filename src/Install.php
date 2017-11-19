<?php


$path = getcwd();
print_r("将在当前位置创建项目，是否确定(y/n)？\n");

if (count($argv) < 2 || $argv[1] != '-y') {
    $read = read();
    if (strtolower($read) != 'y') {
        exit();
    }
}

copy_dir(__DIR__ . "/bin", $path . "/bin", true);
@mkdir('src');
copy_dir(__DIR__ . "/app", $path . "/src/app");
copy_dir(__DIR__ . "/config", $path . "/src/config");

print_r("bin目录下start_swoole_serverphp是启动文件，define.php可以自定义目录配置，祝君使用愉快。\n");


function read()
{
    $fp = fopen('php://stdin', 'r');
    $input = fgets($fp, 255);
    fclose($fp);
    $input = chop($input);
    return $input;
}

function copy_dir($src, $dst, $force = false)
{
    if (file_exists($dst) && $force == false) {
        print_r("$dst 目录已存在（跳过）\n");
        return;
    }
    $dir = opendir($src);
    @mkdir($dst);
    while (false !== ($file = readdir($dir))) {
        if (($file != '.') && ($file != '..')) {
            if (is_dir($src . '/' . $file)) {
                copy_dir($src . '/' . $file, $dst . '/' . $file);
                continue;
            } else {
                copy($src . '/' . $file, $dst . '/' . $file);
            }
        }
    }
    closedir($dir);
    print_r("已创建$dst 目录\n");
}
