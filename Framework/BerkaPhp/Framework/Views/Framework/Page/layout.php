<h3 class="title label label-default">Layout</h3>

<p class="box">
    An application may contain common parts in the UI which remains the same throughout the application such as
    the logo, header, left navigation bar, right bar or footer section. in other words it's  contains
    these common UI parts, so that we don't have to write the same code in every page.
    The layout view is same as the master page. <br/>
    layout  is stored in the <strong>Views/{{}}/Layout/layout.php</strong> directory.
</p class="box">
<p class="box">
    Below is an example of a basic controller class.
    Note that the <strong>UsersController</strong> extends the base BerkaPhpController to inherit its functionality.
</p>
<br/>
<h3 class="sub_title">Example of a simple layout </h3>
<div class="well code comment">
    &lt;!DOCTYPE html&gt;<br/>
    &lt;html lang="en"&gt;<br/>
    &lt;head&gt;<br/>
    &lt;/head&gt;<br/>
    &lt;body&gt;<br/>
         {content}<br/>
    &lt;/body&gt;<br/>
    &lt;/html&gt;<br/>
</div>
<p class="box">
    <span class="red">{content}</span> this where the framework will display all view in runtime
</p>



