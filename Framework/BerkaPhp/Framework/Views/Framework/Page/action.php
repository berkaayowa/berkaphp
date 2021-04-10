<h3 class="title label label-default">Action</h3>

<p class="box">
The template files for these actions should be in <strong>/Views/{{Prefix}}/{{ControllerName}}/{{ActionName}}.php</strong>

The conventional view file name is the lowercased and underscored version of the action name.
</p>
<br/>
<h3>Role of actions</h3>
<p class="box">
Action Methods are methods defined in the controller class and are responsible
to perform operations based on the user's inputs like entering a URL into the browser,clicking a link, and submitting a form.
</p>
<br/>
<h3>Example of actions</h3>
<p class="box">Below is an example of an <strong>about</strong> view of ContactController.
The template files for this action  would be in <br>
<strong>Controllers/Client/</strong> directory <br/><br/>
For the above  action template would be <strong>Views/Client/Contact/about.php</strong>
</p>
<br/>

<div class="well code">
    <span class="namespace">&lt;php</span><br/><br/>
    <span class="namespace">namespace</span>Controller\Client;<br/>
    <span class="namespace">use</span>BerkaPhp\Controller\BerkaPhpController;<br/><br/>
    <span class="namespace">class</span>ContactController<span class="namespace space_left">extends</span>BerkaPhpController {
    <div class="tab_one">
        <span class="namespace">function </span>__construct() {
        <br/>
        <div class="tab_one">
            parent::__construct(<span class="red"></span>);
        </div>
        }
        <br/>
        <br/><span class="comment">//here is about action </span>
        <br/>
        <span class="namespace">function </span>about() {
        <br/>
        <div class="tab_one">
            $this->view->render();
        </div>
        }
    </div>
    }
    <br/><br/>
    <span class="namespace">?&gt;</span>
</div>