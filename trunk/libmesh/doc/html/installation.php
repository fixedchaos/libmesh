<?php $root=""; ?>
<?php require($root."navigation.php"); ?>

<html>
<head>
  <title>libMesh Examples</title>
  <?php load_style($root); ?>
</head>

<body>
<?php make_navigation("download",$root)?>

<div class="content">
<h1>Installation Instructions</h1>

<br>
<h2><a name="getsoftware">Getting the Software</a></h2>
<br>
The <code>libMesh</code> source can be 
<a href="http://sourceforge.net/project/showfiles.php?group_id=71130">downloaded from the project's SourceForge homepage</a>.
Stable releases are located there as compressed tar archives. You may also
access the CVS source tree for the latest code. You can get read-only access
to the CVS repository via:
<br>

<div class="fragment">
  <pre>cvs -d:pserver:anonymous@cvs.sourceforge.net:/cvsroot/libmesh co libmesh </pre>
</div>

<br>
If you would like to contribute to the project you will need a SourceForge
developer account, or you can contribute patches. To create a patch from a
modified CVS tree simply do:
<br>
<div class="fragment">
  <pre>cvs diff -c &gt; patch </pre>
</div>

<br>
in the top-level directory. You can then submit the file <code>patch</code>.
<br>

<h2><a name="compilers">Compilers</a></h2>
<br>
<code>libMesh</code> makes extensive use of the standard C++ library,
so you will need a decent, standards-compliant compiler. We have tried
very hard to make the code completely compiler-agnostic by avoiding
questionable (but legal) constructs. If you have a compiler that won't
build the code please let us know. You will also need a decent C compiler
if you want to build some of the contributed packages that add functionality
to the library.

<br>
The library is known to work with the following compilers:
<br>
<ul>
  <li>GNU GCC</li>
    <ul>
      <li><code>gcc</code> 3.x</li>
      <li><code>gcc</code> 2.95.3</li>
      <li><code>gcc</code> 2.96 (RedHat's compiler in the 7.x series)</li>
    </ul>
  <li>Intel ICC/ECC</li>
    <ul>
      <li><code>icc/ifc</code> 7.x</li>
      <li><code>icc/ifc</code> 6.0</li>
      <li>Earlier versions (&lt;= 5.0) not supported</li>
    </ul>
  <li>SGI MIPSPro Compilers</li>
    <ul>
      <li>Version 7.30<li>Not tested (but will likely work) with others</li>
    </ul>
  <li>HP, use <code>CXX="aCC</code> <code>-AA</code>"
      and <code>CC="cc</code> <code>-Aa</code>" to get full std support</li>
    <ul>
      <li><code>aCC</code> A.03.37</li>
    </ul>
  <li>IBM <code>xlC</code> version 5.0, 6.0</li>
  <li>HP/Compaq/DEC <code>cxx</code> 6.3.9.6</li>
</ul>


<h2><a name="conf">Configuration</a></h2>

<br>
Configuring the library is straightforward. The GNU autoconf package is used
to determine site-specific configuration parameters. A standard build will
occur after typing
<br>

<div class="fragment">
<pre>./configure
make
</pre>
</div>

<br>
in the top-level project directory. To see all the configuration options type
<p>
<div class="fragment">
<pre>./configure --help</pre>
</div>

<br>
The configure script will find your compilers and create the <code>Make.common</code>
file with the configuration for your site. If you want to use different compilers than
those found by configure you can specify them in environment variables. For example,
the following will build with the <code>MIPS</code> compilers on an SGI:

<br>
<div class="fragment">
<pre>CXX=CC CC=cc F77=f77 CXXFLAGS=-LANG:std ./configure</pre>
</div>

<br>
Note that the FORTRAN compiler is not actually used to compile any part of the library,
but <code>configure</code> uses it to find out how to link FORTRAN libraries with C++ code.
<br>
<h2><a name="build">Building the Library</a></h2>
<br>
To build the library you need <code>GNU</code> <code>Make</code> and a supported compiler,
as listed in the <a href="installation.php#conf">Configuration</a> section. After the library
is configured simply type <code>make</code> to build the library. Typing
<code>make bin/meshtool</code> will build a mesh translation tool using the library.

<br>
The Makefiles distributed with the library look at the shell environment variable
<code>METHOD</code> to determine what mode the library should be built in. Valid 
values for <code>METHOD</code> are <code>opt</code> (optimized mode, the default 
if <code>METHOD</code> is empty), <code>debug</code> (build with debug symbols), 
and <code>pro</code> (build with profiling support for use with <code>gprof)</code>. 
Once the library is configured you can build it simply by typing

<div class="fragment">
<pre>make</pre>
</div>

<br>
<h2><a name="test">Testing the Library</a></h2>
<br>
<code>libMesh</code> includes a number of examples in the <code>examples</code>
directory. From the top-level directory you can build and run the example programs 
by typing
<div class="fragment">
<pre>make run_examples</pre>
</div>

<br>
Note that the example programs all create output in the <code>GMV</code> format,
since you can <a href="http://laws.lanl.gov/XCM/gmv/GMVHome.html">download GMV</a>
for free from Los Alamos National Lab. It is a simple matter to change the source
in the example to write a different format, just replace the <code>write_gmv</code>
function call with whatever you like.
<br>
<h2><a name="link">Linking With Your Application</a></h2>
<br>
Since <code>libMesh</code> can be configured with many additional packages we recommend
including the <code>Make.common</code> file created in the top-level directory in the
<code>Makefile</code> of any application you want to use with the library. This will
properly set the <code>INCLUDE</code> and <code>LIBS</code> variables, which you can
append to with your own stuff. You could of course figure out what these need to be
yourself, but don't complain that it is hard.

<br> 


</div>

<!--
<div id="navBeta">
</div>
-->

<?php make_footer() ?>

</body>
</html>


<?php if (0) { ?>
# Local Variables:
# mode: html
# End:
<?php } ?>