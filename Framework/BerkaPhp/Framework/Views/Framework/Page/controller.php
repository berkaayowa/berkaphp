<h3 class="title label label-default">Controller</h3>

<p class="box">
    A controller is responsible of controlling the flow ,actions and sending data to the view.
    Controllers can group related request handling logic into a single class.
    They are stored in the <strong>Controllers/Client/</strong> directory.
</p class="box">
<p class="box">
    Below is an example of a basic controller class.
    Note that the <strong>UsersController</strong> extends the base BerkaPhpController to inherit its functionality.
</p>
<br/>
<h3 class="sub_title">User Controller </h3>
<div class="well code">
    <span class="namespace">&lt;php</span><br/><br/>
    <span class="namespace">namespace</span>Controller\Client;<br/>
    <span class="namespace">use</span>BerkaPhp\Controller\BerkaPhpController;<br/><br/>
    <span class="namespace">class</span>UsersController<span class="namespace space_left">extends</span>BerkaPhpController {
    <div class="tab_one">
        <span class="namespace">function </span>__construct() {
        <br/>
        <div class="tab_one">
            parent::__construct();
        </div>
        }
    </div>
    }
    <br/><br/>
    <span class="namespace">?&gt;</span>
</div>
<br/>
<br/>



