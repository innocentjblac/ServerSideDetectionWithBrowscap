<?php
use phpbrowscap\Browscap;
?>

<h2>Download</h2>

<?php
$bc = new Browscap('../cache');

// get information about the current browser's user agent
$current_browser = $bc->getBrowser();

if (!strncmp($current_browser->Platform, 'Win', 3)):
?>

<p><a href="/downloads/windows.zip" class="btn btn-large btn-primary"><i class="icon-windows"></i> Download for Windows</a></p>
<p>Alternatively, download for <a href="/downloads/mac.dmg">Mac</a> or <a href="/downloads/linux.tar.gz">Linux</a>.</p>

<?php elseif (!strncmp($current_browser->Platform, 'Mac', 3)): ?>

<p><a href="/downloads/mac.dmg" class="btn btn-large btn-primary"><i class="icon-finder"></i> Download for Mac</a></p>
<p>Alternatively, download for <a href="/downloads/windows.zip">Windows</a> or <a href="/downloads/linux.tar.gz">Linux</a>.</p>

<?php elseif ($current_browser->Platform == 'Linux'): ?>

<p><a href="/downloads/linux.tar.gz" class="btn btn-large btn-primary"><i class="icon-tux"></i> Download for Linux</a></p>
<p>Alternatively, download for <a href="/downloads/windows.zip">Windows</a> or <a href="/downloads/mac.dmg">Mac</a>.</p>

<?php else: ?>

<p>Select your version:</p>
<ul>
 <li><a href="/downloads/windows.zip">Windows</a></li>
 <li><a href="/downloads/mac.dmg">Mac</a></li>
 <li><a href="/downloads/linux.tar.gz">Linux</a></li>
</ul>

<?php endif; ?>
