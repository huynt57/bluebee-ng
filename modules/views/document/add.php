<div class="bs-docs-section">
    <h2 id="forms-example">Basic example</h2>
    <p>Individual form controls automatically receive some global styling. All textual <code>&lt;input&gt;</code>, <code>&lt;textarea&gt;</code>, and <code>&lt;select&gt;</code> elements with <code>.form-control</code> are set to <code>width: 100%;</code> by default. Wrap labels and controls in <code>.form-group</code> for optimum spacing.</p>
    <div class="bs-example">
        <form role="form">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <input type="file" id="exampleInputFile"><br>
                <p class="help-block">Example block-level help text here.</p>
            </div>
            <label class="checkbox">
                <div class="new-checkbox"><input type="checkbox"><svg x="0" y="0" width="15px" height="15px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve"><polygon fill="#1e1e1e" points="9.298,13.391 4.18,9.237 3,10.079 9.297,17 17.999,4.678 16.324,3 "></polygon></svg></div> Check me out
            </label>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div><!-- /example -->
    <div class="highlight">
        <pre><code class="html"><span class="nt">&lt;form</span> <span class="na">role=</span><span class="s">"form"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"form-group"</span><span class="nt">&gt;</span>
	<span class="nt">&lt;label</span> <span class="na">for=</span><span class="s">"exampleInputEmail1"</span><span class="nt">&gt;</span>Email address<span class="nt">&lt;/label&gt;</span>
	<span class="nt">&lt;input</span> <span class="na">type=</span><span class="s">"email"</span> <span class="na">class=</span><span class="s">"form-control"</span> <span class="na">id=</span><span class="s">"exampleInputEmail1"</span> <span class="na">placeholder=</span><span class="s">"Enter email"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;/div&gt;</span>
  <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"form-group"</span><span class="nt">&gt;</span>
	<span class="nt">&lt;label</span> <span class="na">for=</span><span class="s">"exampleInputPassword1"</span><span class="nt">&gt;</span>Password<span class="nt">&lt;/label&gt;</span>
	<span class="nt">&lt;input</span> <span class="na">type=</span><span class="s">"password"</span> <span class="na">class=</span><span class="s">"form-control"</span> <span class="na">id=</span><span class="s">"exampleInputPassword1"</span> <span class="na">placeholder=</span><span class="s">"Password"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;/div&gt;</span>
  <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"form-group"</span><span class="nt">&gt;</span>
	<span class="nt">&lt;label</span> <span class="na">for=</span><span class="s">"exampleInputFile"</span><span class="nt">&gt;</span>File input<span class="nt">&lt;/label&gt;</span>
	<span class="nt">&lt;input</span> <span class="na">type=</span><span class="s">"file"</span> <span class="na">id=</span><span class="s">"exampleInputFile"</span><span class="nt">&gt;</span>
	<span class="nt">&lt;p</span> <span class="na">class=</span><span class="s">"help-block"</span><span class="nt">&gt;</span>Example block-level help text here.<span class="nt">&lt;/p&gt;</span>
  <span class="nt">&lt;/div&gt;</span>
  <span class="nt">&lt;label</span> <span class="na">class=</span><span class="s">"checkbox"</span><span class="nt">&gt;</span>
	<span class="nt">&lt;input</span> <span class="na">type=</span><span class="s">"checkbox"</span><span class="nt">&gt;</span> Check me out
  <span class="nt">&lt;/label&gt;</span>
  <span class="nt">&lt;button</span> <span class="na">type=</span><span class="s">"submit"</span> <span class="na">class=</span><span class="s">"btn btn-default"</span><span class="nt">&gt;</span>Submit<span class="nt">&lt;/button&gt;</span>
<span class="nt">&lt;/form&gt;</span>
</code>
        </pre>
    </div>
    <div class="bs-callout bs-callout-warning">
        <h4>Don't mix form groups with input groups</h4>
        <p>Do not mix form groups directly with <a href="http://template.progressive.itembridge.com/components/#input-groups">input groups</a>. Instead, nest the input group inside of the form group.</p>
    </div>


    <h2 id="forms-inline">Inline form</h2>
    <p>Add <code>.form-inline</code> to your <code>&lt;form&gt;</code> for left-aligned and inline-block controls. <strong>This only applies to forms within viewports that are at least 768px wide.</strong></p>
    <div class="bs-callout bs-callout-danger">
        <h4>Requires custom widths</h4>
        <p>Inputs, selects, and textareas are 100% wide by default in Bootstrap. To use the inline form, you'll have to set a width on the form controls used within.</p>
    </div>
    <div class="bs-callout bs-callout-warning">
        <h4>Always add labels</h4>
        <p>Screen readers will have trouble with your forms if you don't include a label for every input. For these inline forms, you can hide the labels using the <code>.sr-only</code> class.</p>
    </div>
    <div class="bs-example">
        <form class="form-inline" role="form">
            <div class="form-group">
                <label class="sr-only" for="exampleInputEmail2">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label class="sr-only" for="exampleInputPassword2">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
            </div>
            <label class="checkbox">
                <div class="new-checkbox"><input type="checkbox"><svg x="0" y="0" width="15px" height="15px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve"><polygon fill="#1e1e1e" points="9.298,13.391 4.18,9.237 3,10.079 9.297,17 17.999,4.678 16.324,3 "></polygon></svg></div> Remember me
            </label>
            <button type="submit" class="btn btn-default">Sign in</button>
        </form>
    </div><!-- /example -->
    <div class="highlight">
        <pre><code class="html"><span class="nt">&lt;form</span> <span class="na">class=</span><span class="s">"form-inline"</span> <span class="na">role=</span><span class="s">"form"</span><span class="nt">&gt;</span>
<span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"form-group"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;label</span> <span class="na">class=</span><span class="s">"sr-only"</span> <span class="na">for=</span><span class="s">"exampleInputEmail2"</span><span class="nt">&gt;</span>Email address<span class="nt">&lt;/label&gt;</span>
  <span class="nt">&lt;input</span> <span class="na">type=</span><span class="s">"email"</span> <span class="na">class=</span><span class="s">"form-control"</span> <span class="na">id=</span><span class="s">"exampleInputEmail2"</span> <span class="na">placeholder=</span><span class="s">"Enter email"</span><span class="nt">&gt;</span>
<span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"form-group"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;label</span> <span class="na">class=</span><span class="s">"sr-only"</span> <span class="na">for=</span><span class="s">"exampleInputPassword2"</span><span class="nt">&gt;</span>Password<span class="nt">&lt;/label&gt;</span>
  <span class="nt">&lt;input</span> <span class="na">type=</span><span class="s">"password"</span> <span class="na">class=</span><span class="s">"form-control"</span> <span class="na">id=</span><span class="s">"exampleInputPassword2"</span> <span class="na">placeholder=</span><span class="s">"Password"</span><span class="nt">&gt;</span>
<span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;label</span> <span class="na">class=</span><span class="s">"checkbox"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;input</span> <span class="na">type=</span><span class="s">"checkbox"</span><span class="nt">&gt;</span> Remember me
<span class="nt">&lt;/label&gt;</span>
<span class="nt">&lt;button</span> <span class="na">type=</span><span class="s">"submit"</span> <span class="na">class=</span><span class="s">"btn btn-default"</span><span class="nt">&gt;</span>Sign in<span class="nt">&lt;/button&gt;</span>
<span class="nt">&lt;/form&gt;</span>
</code>
        </pre>
    </div>


    <h2 id="forms-horizontal">Horizontal form</h2>
    <p>Use Bootstrap's predefined grid classes to align labels and groups of form controls in a horizontal layout by adding <code>.form-horizontal</code> to the form. Doing so changes <code>.form-group</code>s to behave as grid rows, so no need for <code>.row</code>.</p>
    <div class="bs-example">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <label class="checkbox">
                        <div class="new-checkbox"><input type="checkbox"><svg x="0" y="0" width="15px" height="15px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve"><polygon fill="#1e1e1e" points="9.298,13.391 4.18,9.237 3,10.079 9.297,17 17.999,4.678 16.324,3 "></polygon></svg></div> Remember me
                    </label>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Sign in</button>
                </div>
            </div>
        </form>
    </div><!-- /.bs-example -->
    <div class="highlight">
        <pre><code class="html"><span class="nt">&lt;form</span> <span class="na">class=</span><span class="s">"form-horizontal"</span> <span class="na">role=</span><span class="s">"form"</span><span class="nt">&gt;</span>
<span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"form-group"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;label</span> <span class="na">for=</span><span class="s">"inputEmail3"</span> <span class="na">class=</span><span class="s">"col-sm-2 control-label"</span><span class="nt">&gt;</span>Email<span class="nt">&lt;/label&gt;</span>
  <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"col-sm-10"</span><span class="nt">&gt;</span>
	<span class="nt">&lt;input</span> <span class="na">type=</span><span class="s">"email"</span> <span class="na">class=</span><span class="s">"form-control"</span> <span class="na">id=</span><span class="s">"inputEmail3"</span> <span class="na">placeholder=</span><span class="s">"Email"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"form-group"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;label</span> <span class="na">for=</span><span class="s">"inputPassword3"</span> <span class="na">class=</span><span class="s">"col-sm-2 control-label"</span><span class="nt">&gt;</span>Password<span class="nt">&lt;/label&gt;</span>
  <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"col-sm-10"</span><span class="nt">&gt;</span>
	<span class="nt">&lt;input</span> <span class="na">type=</span><span class="s">"password"</span> <span class="na">class=</span><span class="s">"form-control"</span> <span class="na">id=</span><span class="s">"inputPassword3"</span> <span class="na">placeholder=</span><span class="s">"Password"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"form-group"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"col-sm-offset-2 col-sm-10"</span><span class="nt">&gt;</span>
	<span class="nt">&lt;label</span> <span class="na">class=</span><span class="s">"checkbox"</span><span class="nt">&gt;</span>
	  <span class="nt">&lt;input</span> <span class="na">type=</span><span class="s">"checkbox"</span><span class="nt">&gt;</span> Remember me
	<span class="nt">&lt;/label&gt;</span>
  <span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"form-group"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"col-sm-offset-2 col-sm-10"</span><span class="nt">&gt;</span>
	<span class="nt">&lt;button</span> <span class="na">type=</span><span class="s">"submit"</span> <span class="na">class=</span><span class="s">"btn btn-default"</span><span class="nt">&gt;</span>Sign in<span class="nt">&lt;/button&gt;</span>
  <span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;/form&gt;</span>
</code>
        </pre>
    </div>


    <h2 id="forms-controls">Supported controls</h2>
    <p>Examples of standard form controls supported in an example form layout.</p>

    <h3>Inputs</h3>
    <p>Most common form control, text-based input fields. Includes support for all HTML5 types: <code>text</code>, <code>password</code>, <code>datetime</code>, <code>datetime-local</code>, <code>date</code>, <code>month</code>, <code>time</code>, <code>week</code>, <code>number</code>, <code>email</code>, <code>url</code>, <code>search</code>, <code>tel</code>, and <code>color</code>.</p>
    <div class="bs-callout bs-callout-danger">
        <h4>Type declaration required</h4>
        <p>Inputs will only be fully styled if their <code>type</code> is properly declared.</p>
    </div>
    <div class="bs-example">
        <form role="form">
            <input type="text" class="form-control" placeholder="Text input">
        </form>
    </div><!-- /.bs-example -->
    <div class="highlight">
        <pre><code class="html"><span class="nt">&lt;input</span> <span class="na">type=</span><span class="s">"text"</span> <span class="na">class=</span><span class="s">"form-control"</span> <span class="na">placeholder=</span><span class="s">"Text input"</span><span class="nt">&gt;</span>
</code>
        </pre>
    </div>
    <div class="bs-callout bs-callout-info">
        <h4>Input groups</h4>
        <p>To add integrated text or buttons before and/or after any text-based <code>&lt;input&gt;</code>, <a href="http://template.progressive.itembridge.com/components/#input-groups">check out the input group component</a>.</p>
    </div>

    <h3>Textarea</h3>
    <p>Form control which supports multiple lines of text. Change <code>rows</code> attribute as necessary.</p>
    <div class="bs-example">
        <form role="form">
            <textarea class="form-control" rows="3"></textarea>
        </form>
    </div><!-- /.bs-example -->
    <div class="highlight">
        <pre><code class="html"><span class="nt">&lt;textarea</span> <span class="na">class=</span><span class="s">"form-control"</span> <span class="na">rows=</span><span class="s">"3"</span><span class="nt">&gt;&lt;/textarea&gt;</span>
</code>
        </pre>
    </div>

    <h3>Checkboxes and radios</h3>
    <p>Checkboxes are for selecting one or several options in a list while radios are for selecting one option from many.</p>
    <h4>Default (stacked)</h4>
    <div class="bs-example">
        <form role="form">
            <label class="checkbox">
                <div class="new-checkbox"><input type="checkbox" value=""><svg x="0" y="0" width="15px" height="15px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve"><polygon fill="#1e1e1e" points="9.298,13.391 4.18,9.237 3,10.079 9.297,17 17.999,4.678 16.324,3 "></polygon></svg></div>
                Option one is this and that—be sure to include why it's great
            </label>
            <br>
            <label class="radio">
                <div class="new-radio checked"><input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked=""><span></span></div>
                Option one is this and that—be sure to include why it's great
            </label>
            <label class="radio">
                <div class="new-radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"><span></span></div>
                Option two can be something else and selecting it will deselect option one
            </label>
        </form>
    </div><!-- /.bs-example -->
    <div class="highlight">
        <pre><code class="html"><span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"checkbox"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;label&gt;</span>
	<span class="nt">&lt;input</span> <span class="na">type=</span><span class="s">"checkbox"</span> <span class="na">value=</span><span class="s">""</span><span class="nt">&gt;</span>
	Option one is this and that<span class="ni">&amp;mdash;</span>be sure to include why it's great
  <span class="nt">&lt;/label&gt;</span>
<span class="nt">&lt;/div&gt;</span>

<span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"radio"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;label&gt;</span>
	<span class="nt">&lt;input</span> <span class="na">type=</span><span class="s">"radio"</span> <span class="na">name=</span><span class="s">"optionsRadios"</span> <span class="na">id=</span><span class="s">"optionsRadios1"</span> <span class="na">value=</span><span class="s">"option1"</span> <span class="na">checked</span><span class="nt">&gt;</span>
	Option one is this and that<span class="ni">&amp;mdash;</span>be sure to include why it's great
  <span class="nt">&lt;/label&gt;</span>
<span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"radio"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;label&gt;</span>
	<span class="nt">&lt;input</span> <span class="na">type=</span><span class="s">"radio"</span> <span class="na">name=</span><span class="s">"optionsRadios"</span> <span class="na">id=</span><span class="s">"optionsRadios2"</span> <span class="na">value=</span><span class="s">"option2"</span><span class="nt">&gt;</span>
	Option two can be something else and selecting it will deselect option one
  <span class="nt">&lt;/label&gt;</span>
<span class="nt">&lt;/div&gt;</span>
</code>
        </pre>
    </div>

    <h4>Inline checkboxes</h4>
    <p>Use the <code>.checkbox-inline</code> or <code>.radio-inline</code> classes on a series of checkboxes or radios for controls that appear on the same line.</p>
    <div class="bs-example">
        <form role="form">
            <label class="checkbox-inline">
                <div class="new-checkbox"><input type="checkbox" id="inlineCheckbox1" value="option1"><svg x="0" y="0" width="15px" height="15px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve"><polygon fill="#1e1e1e" points="9.298,13.391 4.18,9.237 3,10.079 9.297,17 17.999,4.678 16.324,3 "></polygon></svg></div> 1
            </label>
            <label class="checkbox-inline">
                <div class="new-checkbox"><input type="checkbox" id="inlineCheckbox2" value="option2"><svg x="0" y="0" width="15px" height="15px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve"><polygon fill="#1e1e1e" points="9.298,13.391 4.18,9.237 3,10.079 9.297,17 17.999,4.678 16.324,3 "></polygon></svg></div> 2
            </label>
            <label class="checkbox-inline">
                <div class="new-checkbox"><input type="checkbox" id="inlineCheckbox3" value="option3"><svg x="0" y="0" width="15px" height="15px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve"><polygon fill="#1e1e1e" points="9.298,13.391 4.18,9.237 3,10.079 9.297,17 17.999,4.678 16.324,3 "></polygon></svg></div> 3
            </label>
        </form>
    </div><!-- /.bs-example -->
    <div class="highlight">
        <pre><code class="html"><span class="nt">&lt;label</span> <span class="na">class=</span><span class="s">"checkbox-inline"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;input</span> <span class="na">type=</span><span class="s">"checkbox"</span> <span class="na">id=</span><span class="s">"inlineCheckbox1"</span> <span class="na">value=</span><span class="s">"option1"</span><span class="nt">&gt;</span> 1
<span class="nt">&lt;/label&gt;</span>
<span class="nt">&lt;label</span> <span class="na">class=</span><span class="s">"checkbox-inline"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;input</span> <span class="na">type=</span><span class="s">"checkbox"</span> <span class="na">id=</span><span class="s">"inlineCheckbox2"</span> <span class="na">value=</span><span class="s">"option2"</span><span class="nt">&gt;</span> 2
<span class="nt">&lt;/label&gt;</span>
<span class="nt">&lt;label</span> <span class="na">class=</span><span class="s">"checkbox-inline"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;input</span> <span class="na">type=</span><span class="s">"checkbox"</span> <span class="na">id=</span><span class="s">"inlineCheckbox3"</span> <span class="na">value=</span><span class="s">"option3"</span><span class="nt">&gt;</span> 3
<span class="nt">&lt;/label&gt;</span>
</code>
        </pre>
    </div>

    <h3>Selects</h3>
    <p>Use the default option, or add <code>multiple</code> to show multiple options at once.</p>
    <div class="bs-example">
        <form role="form">
            <select class="form-control selectBox" style="display: none;">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select><a class="selectBox form-control selectBox-dropdown" title="" tabindex="0" style="width: 1138px; display: inline-block;"><span class="selectBox-label" style="width: 1105px;">1</span><span class="selectBox-arrow"></span></a>
            <br>
            <select multiple="" class="form-control selectBox" style="display: none;">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select><a class="selectBox form-control selectBox-inline selectBox-menuShowing" title="" tabindex="0" style="width: 1138px; display: inline-block; height: 117px;"><ul class="selectBox-options"><li><a rel="1">1</a></li><li><a rel="2">2</a></li><li><a rel="3">3</a></li><li><a rel="4">4</a></li><li><a rel="5">5</a></li></ul></a>
        </form>
    </div><!-- /.bs-example -->
    <div class="highlight">
        <pre><code class="html"><span class="nt">&lt;select</span> <span class="na">class=</span><span class="s">"form-control"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;option&gt;</span>1<span class="nt">&lt;/option&gt;</span>
  <span class="nt">&lt;option&gt;</span>2<span class="nt">&lt;/option&gt;</span>
  <span class="nt">&lt;option&gt;</span>3<span class="nt">&lt;/option&gt;</span>
  <span class="nt">&lt;option&gt;</span>4<span class="nt">&lt;/option&gt;</span>
  <span class="nt">&lt;option&gt;</span>5<span class="nt">&lt;/option&gt;</span>
<span class="nt">&lt;/select&gt;</span>

<span class="nt">&lt;select</span> <span class="na">multiple</span> <span class="na">class=</span><span class="s">"form-control"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;option&gt;</span>1<span class="nt">&lt;/option&gt;</span>
  <span class="nt">&lt;option&gt;</span>2<span class="nt">&lt;/option&gt;</span>
  <span class="nt">&lt;option&gt;</span>3<span class="nt">&lt;/option&gt;</span>
  <span class="nt">&lt;option&gt;</span>4<span class="nt">&lt;/option&gt;</span>
  <span class="nt">&lt;option&gt;</span>5<span class="nt">&lt;/option&gt;</span>
<span class="nt">&lt;/select&gt;</span>
</code>
        </pre>
    </div>


    <h2 id="forms-controls-static">Static control</h2>
    <p>When you need to place plain text next to a form label within a horizontal form, use the <code>.form-control-static</code> class on a <code>&lt;p&gt;</code>.</p>
    <div class="bs-example">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <p class="form-control-static">email@example.com</p>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                </div>
            </div>
        </form>
    </div><!-- /.bs-example -->
    <div class="highlight">
        <pre><code class="html"><span class="nt">&lt;form</span> <span class="na">class=</span><span class="s">"form-horizontal"</span> <span class="na">role=</span><span class="s">"form"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"form-group"</span><span class="nt">&gt;</span>
	<span class="nt">&lt;label</span> <span class="na">class=</span><span class="s">"col-sm-2 control-label"</span><span class="nt">&gt;</span>Email<span class="nt">&lt;/label&gt;</span>
	<span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"col-sm-10"</span><span class="nt">&gt;</span>
	  <span class="nt">&lt;p</span> <span class="na">class=</span><span class="s">"form-control-static"</span><span class="nt">&gt;</span>email@example.com<span class="nt">&lt;/p&gt;</span>
	<span class="nt">&lt;/div&gt;</span>
  <span class="nt">&lt;/div&gt;</span>
  <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"form-group"</span><span class="nt">&gt;</span>
	<span class="nt">&lt;label</span> <span class="na">for=</span><span class="s">"inputPassword"</span> <span class="na">class=</span><span class="s">"col-sm-2 control-label"</span><span class="nt">&gt;</span>Password<span class="nt">&lt;/label&gt;</span>
	<span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"col-sm-10"</span><span class="nt">&gt;</span>
	  <span class="nt">&lt;input</span> <span class="na">type=</span><span class="s">"password"</span> <span class="na">class=</span><span class="s">"form-control"</span> <span class="na">id=</span><span class="s">"inputPassword"</span> <span class="na">placeholder=</span><span class="s">"Password"</span><span class="nt">&gt;</span>
	<span class="nt">&lt;/div&gt;</span>
  <span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;/form&gt;</span>
</code>
        </pre>
    </div>

    <h2 id="forms-control-focus">Input focus</h2>
    <p>We remove the default <code>outline</code> styles on some form controls and apply a <code>box-shadow</code> in its place for <code>:focus</code>.</p>
    <div class="bs-example">
        <form role="form">
            <input class="form-control" id="focusedInput" type="text" value="Demonstrative focus state">
        </form>
    </div>
    <div class="bs-callout bs-callout-info">
        <h4>Demo <code>:focus</code> state</h4>
        <p>The above example input uses custom styles in our documentation to demonstrate the <code>:focus</code> state on a <code>.form-control</code>.</p>
    </div>


    <h2 id="forms-control-disabled">Disabled inputs</h2>
    <p>Add the <code>disabled</code> attribute on an input to prevent user input and trigger a slightly different look.</p>
    <div class="bs-example">
        <form role="form">
            <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input here…" disabled="">
        </form>
    </div><!-- /.bs-example -->
    <div class="highlight">
        <pre><code class="html"><span class="nt">&lt;input</span> <span class="na">class=</span><span class="s">"form-control"</span> <span class="na">id=</span><span class="s">"disabledInput"</span> <span class="na">type=</span><span class="s">"text"</span> <span class="na">placeholder=</span><span class="s">"Disabled input here..."</span> <span class="na">disabled</span><span class="nt">&gt;</span>
</code>
        </pre>
    </div>

    <h3 id="forms-disabled-fieldsets">Disabled fieldsets</h3>
    <p>Add the <code>disabled</code> attribute to a <code>&lt;fieldset&gt;</code> to disable all the controls within the <code>&lt;fieldset&gt;</code> at once.</p>

    <div class="bs-callout bs-callout-warning">
        <h4>Link functionality of <code>&lt;a&gt;</code> not impacted</h4>
        <p>This class will only change the appearance of <code>&lt;a class="btn btn-default"&gt;</code> buttons, not their functionality. Use custom JavaScript to disable links here.</p>
    </div>

    <div class="bs-callout bs-callout-danger">
        <h4>Cross-browser compatibility</h4>
        <p>While Bootstrap will apply these styles in all browsers, Internet Explorer 9 and below don't actually support the <code>disabled</code> attribute on a <code>&lt;fieldset&gt;</code>. Use custom JavaScript to disable the fieldset in these browsers.</p>
    </div>

    <div class="bs-example">
        <form role="form">
            <fieldset disabled="">
                <div class="form-group">
                    <label for="disabledTextInput">Disabled input</label>
                    <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input">
                </div>
                <div class="form-group no-margin">
                    <label for="disabledSelect">Disabled select menu</label>
                    <select id="disabledSelect" class="form-control selectBox" disabled="disabled" style="display: none;">
                        <option>Disabled select</option>
                    </select><a class="selectBox form-control selectBox-disabled selectBox-dropdown" title="" tabindex="0" style="width: 1138px; display: inline-block;"><span class="selectBox-label" style="width: 1105px;">Disabled select</span><span class="selectBox-arrow"></span></a>
                </div>
                <label class="checkbox">
                    <div class="new-checkbox disabled"><input type="checkbox"><svg x="0" y="0" width="15px" height="15px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve"><polygon fill="#1e1e1e" points="9.298,13.391 4.18,9.237 3,10.079 9.297,17 17.999,4.678 16.324,3 "></polygon></svg></div> Can't check this
                </label>
                <button type="submit" class="btn btn-primary">Submit</button>
            </fieldset>
        </form>
    </div><!-- /.bs-example -->
    <div class="highlight">
        <pre><code class="html"><span class="nt">&lt;form</span> <span class="na">role=</span><span class="s">"form"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;fieldset</span> <span class="na">disabled</span><span class="nt">&gt;</span>
	<span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"form-group"</span><span class="nt">&gt;</span>
	  <span class="nt">&lt;label</span> <span class="na">for=</span><span class="s">"disabledTextInput"</span><span class="nt">&gt;</span>Disabled input<span class="nt">&lt;/label&gt;</span>
	  <span class="nt">&lt;input</span> <span class="na">type=</span><span class="s">"text"</span> <span class="na">id=</span><span class="s">"disabledTextInput"</span> <span class="na">class=</span><span class="s">"form-control"</span> <span class="na">placeholder=</span><span class="s">"Disabled input"</span><span class="nt">&gt;</span>
	<span class="nt">&lt;/div&gt;</span>
	<span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"form-group"</span><span class="nt">&gt;</span>
	  <span class="nt">&lt;label</span> <span class="na">for=</span><span class="s">"disabledSelect"</span><span class="nt">&gt;</span>Disabled select menu<span class="nt">&lt;/label&gt;</span>
	  <span class="nt">&lt;select</span> <span class="na">id=</span><span class="s">"disabledSelect"</span> <span class="na">class=</span><span class="s">"form-control"</span><span class="nt">&gt;</span>
		<span class="nt">&lt;option&gt;</span>Disabled select<span class="nt">&lt;/option&gt;</span>
	  <span class="nt">&lt;/select&gt;</span>
	<span class="nt">&lt;/div&gt;</span>
	<span class="nt">&lt;label</span> <span class="na">class=</span><span class="s">"checkbox"</span><span class="nt">&gt;</span>
	  <span class="nt">&lt;input</span> <span class="na">type=</span><span class="s">"checkbox"</span><span class="nt">&gt;</span> Can't check this
	<span class="nt">&lt;/label&gt;</span>
	<span class="nt">&lt;button</span> <span class="na">type=</span><span class="s">"submit"</span> <span class="na">class=</span><span class="s">"btn btn-primary"</span><span class="nt">&gt;</span>Submit<span class="nt">&lt;/button&gt;</span>
  <span class="nt">&lt;/fieldset&gt;</span>
<span class="nt">&lt;/form&gt;</span>
</code>
        </pre>
    </div>


    <h2 id="forms-control-validation">Validation states</h2>
    <p>Bootstrap includes validation styles for error, warning, and success states on form controls. To use, add <code>.has-warning</code>, <code>.has-error</code>, or <code>.has-success</code> to the parent element. Any <code>.control-label</code>, <code>.form-control</code>, and <code>.help-block</code> within that element will receive the validation styles.</p>

    <div class="bs-example">
        <form role="form">
            <div class="form-group has-success">
                <label class="control-label" for="inputSuccess1">Input with success</label>
                <input type="text" class="form-control" id="inputSuccess1">
            </div>
            <div class="form-group has-warning">
                <label class="control-label" for="inputWarning1">Input with warning</label>
                <input type="text" class="form-control" id="inputWarning1">
            </div>
            <div class="form-group has-error">
                <label class="control-label" for="inputError1">Input with error</label>
                <input type="text" class="form-control" id="inputError1">
            </div>
        </form>
    </div><!-- /.bs-example -->
    <div class="highlight">
        <pre><code class="html"><span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"form-group has-success"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;label</span> <span class="na">class=</span><span class="s">"control-label"</span> <span class="na">for=</span><span class="s">"inputSuccess1"</span><span class="nt">&gt;</span>Input with success<span class="nt">&lt;/label&gt;</span>
  <span class="nt">&lt;input</span> <span class="na">type=</span><span class="s">"text"</span> <span class="na">class=</span><span class="s">"form-control"</span> <span class="na">id=</span><span class="s">"inputSuccess1"</span><span class="nt">&gt;</span>
<span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"form-group has-warning"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;label</span> <span class="na">class=</span><span class="s">"control-label"</span> <span class="na">for=</span><span class="s">"inputWarning1"</span><span class="nt">&gt;</span>Input with warning<span class="nt">&lt;/label&gt;</span>
  <span class="nt">&lt;input</span> <span class="na">type=</span><span class="s">"text"</span> <span class="na">class=</span><span class="s">"form-control"</span> <span class="na">id=</span><span class="s">"inputWarning1"</span><span class="nt">&gt;</span>
<span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"form-group has-error"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;label</span> <span class="na">class=</span><span class="s">"control-label"</span> <span class="na">for=</span><span class="s">"inputError1"</span><span class="nt">&gt;</span>Input with error<span class="nt">&lt;/label&gt;</span>
  <span class="nt">&lt;input</span> <span class="na">type=</span><span class="s">"text"</span> <span class="na">class=</span><span class="s">"form-control"</span> <span class="na">id=</span><span class="s">"inputError1"</span><span class="nt">&gt;</span>
<span class="nt">&lt;/div&gt;</span>
</code>
        </pre>
    </div>

    <h3>With optional icons</h3>
    <p>You can also add optional feedback icons with the addition of an extra class and the right icon.</p>
    <div class="bs-callout bs-callout-warning">
        <h4>Icons, labels, and input groups</h4>
        <p>Manual positioning of feedback icons is required for inputs without a label and for <a href="http://template.progressive.itembridge.com/components#input-groups">input groups</a> with an add-on on the right. For inputs without labels, adjust the <code>top</code>value. For input groups, adjust the <code>right</code> value to an appropriate pixel value depending on the width of your addon.</p>
    </div>
    <div class="bs-example">
        <form role="form">
            <div class="form-group has-success has-feedback">
                <label class="control-label" for="inputSuccess2">Input with success</label>
                <input type="text" class="form-control" id="inputSuccess2">
                <span class="glyphicon glyphicon-ok form-control-feedback"></span>
            </div>
            <div class="form-group has-warning has-feedback">
                <label class="control-label" for="inputWarning2">Input with warning</label>
                <input type="text" class="form-control" id="inputWarning2">
                <span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>
            </div>
            <div class="form-group has-error has-feedback">
                <label class="control-label" for="inputError2">Input with error</label>
                <input type="text" class="form-control" id="inputError2">
                <span class="glyphicon glyphicon-remove form-control-feedback"></span>
            </div>
        </form>
    </div>
    <div class="highlight">
        <pre><code class="html"><span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"form-group has-success has-feedback"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;label</span> <span class="na">class=</span><span class="s">"control-label"</span> <span class="na">for=</span><span class="s">"inputSuccess2"</span><span class="nt">&gt;</span>Input with success<span class="nt">&lt;/label&gt;</span>
  <span class="nt">&lt;input</span> <span class="na">type=</span><span class="s">"text"</span> <span class="na">class=</span><span class="s">"form-control"</span> <span class="na">id=</span><span class="s">"inputSuccess2"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;span</span> <span class="na">class=</span><span class="s">"glyphicon glyphicon-ok form-control-feedback"</span><span class="nt">&gt;&lt;/span&gt;</span>
<span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"form-group has-warning has-feedback"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;label</span> <span class="na">class=</span><span class="s">"control-label"</span> <span class="na">for=</span><span class="s">"inputWarning2"</span><span class="nt">&gt;</span>Input with warning<span class="nt">&lt;/label&gt;</span>
  <span class="nt">&lt;input</span> <span class="na">type=</span><span class="s">"text"</span> <span class="na">class=</span><span class="s">"form-control"</span> <span class="na">id=</span><span class="s">"inputWarning2"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;span</span> <span class="na">class=</span><span class="s">"glyphicon glyphicon-warning-sign form-control-feedback"</span><span class="nt">&gt;&lt;/span&gt;</span>
<span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"form-group has-error has-feedback"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;label</span> <span class="na">class=</span><span class="s">"control-label"</span> <span class="na">for=</span><span class="s">"inputError2"</span><span class="nt">&gt;</span>Input with error<span class="nt">&lt;/label&gt;</span>
  <span class="nt">&lt;input</span> <span class="na">type=</span><span class="s">"text"</span> <span class="na">class=</span><span class="s">"form-control"</span> <span class="na">id=</span><span class="s">"inputError2"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;span</span> <span class="na">class=</span><span class="s">"glyphicon glyphicon-remove form-control-feedback"</span><span class="nt">&gt;&lt;/span&gt;</span>
<span class="nt">&lt;/div&gt;</span>
</code>
        </pre>
    </div>

    <p>Optional icons also work on horizontal and inline forms.</p>
    <div class="bs-example">
        <form class="form-horizontal" role="form">
            <div class="form-group has-success has-feedback">
                <label class="control-label col-sm-3" for="inputSuccess3">Input with success</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputSuccess3">
                    <span class="glyphicon glyphicon-ok form-control-feedback"></span>
                </div>
            </div>
        </form>
    </div>
    <div class="highlight">
        <pre><code class="html"><span class="nt">&lt;form</span> <span class="na">class=</span><span class="s">"form-horizontal"</span> <span class="na">role=</span><span class="s">"form"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"form-group has-success has-feedback"</span><span class="nt">&gt;</span>
	<span class="nt">&lt;label</span> <span class="na">class=</span><span class="s">"control-label col-sm-3"</span> <span class="na">for=</span><span class="s">"inputSuccess3"</span><span class="nt">&gt;</span>Input with success<span class="nt">&lt;/label&gt;</span>
	<span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"col-sm-9"</span><span class="nt">&gt;</span>
	  <span class="nt">&lt;input</span> <span class="na">type=</span><span class="s">"text"</span> <span class="na">class=</span><span class="s">"form-control"</span> <span class="na">id=</span><span class="s">"inputSuccess3"</span><span class="nt">&gt;</span>
	  <span class="nt">&lt;span</span> <span class="na">class=</span><span class="s">"glyphicon glyphicon-ok form-control-feedback"</span><span class="nt">&gt;&lt;/span&gt;</span>
	<span class="nt">&lt;/div&gt;</span>
  <span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;/form&gt;</span>
</code></pre></div>

    <div class="bs-example">
        <form class="form-inline" role="form">
            <div class="form-group has-success has-feedback">
                <label class="control-label" for="inputSuccess4">Input with success</label>
                <input type="text" class="form-control" id="inputSuccess4">
                <span class="glyphicon glyphicon-ok form-control-feedback"></span>
            </div>
        </form>
    </div>
    <div class="highlight">
        <pre><code class="html"><span class="nt">&lt;form</span> <span class="na">class=</span><span class="s">"form-inline"</span> <span class="na">role=</span><span class="s">"form"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"form-group has-success has-feedback"</span><span class="nt">&gt;</span>
	<span class="nt">&lt;label</span> <span class="na">class=</span><span class="s">"control-label"</span> <span class="na">for=</span><span class="s">"inputSuccess4"</span><span class="nt">&gt;</span>Input with success<span class="nt">&lt;/label&gt;</span>
	<span class="nt">&lt;input</span> <span class="na">type=</span><span class="s">"text"</span> <span class="na">class=</span><span class="s">"form-control"</span> <span class="na">id=</span><span class="s">"inputSuccess4"</span><span class="nt">&gt;</span>
	<span class="nt">&lt;span</span> <span class="na">class=</span><span class="s">"glyphicon glyphicon-ok form-control-feedback"</span><span class="nt">&gt;&lt;/span&gt;</span>
  <span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;/form&gt;</span>
</code>
        </pre>
    </div>


    <h2 id="forms-control-sizes">Control sizing</h2>
    <p>Set heights using classes like <code>.input-lg</code>, and set widths using grid column classes like <code>.col-lg-*</code>.</p>

    <h3>Height sizing</h3>
    <p>Create taller or shorter form controls that match button sizes.</p>
    <div class="bs-example bs-example-control-sizing">
        <form role="form">
            <div class="controls">
                <input class="form-control input-lg" type="text" placeholder=".input-lg">
                <input type="text" class="form-control" placeholder="Default input">
                <input class="form-control input-sm" type="text" placeholder=".input-sm">

                <select class="form-control input-lg selectBox" style="display: none;">
                    <option value="">.input-lg</option>
                </select><a class="selectBox form-control input-lg selectBox-dropdown" title="" tabindex="0" style="width: 1138px; display: inline-block;"><span class="selectBox-label" style="width: 1105px;">.input-lg</span><span class="selectBox-arrow"></span></a>
                <select class="form-control selectBox" style="display: none;">
                    <option value="">Default select</option>
                </select><a class="selectBox form-control selectBox-dropdown" title="" tabindex="0" style="width: 1138px; display: inline-block;"><span class="selectBox-label" style="width: 1105px;">Default select</span><span class="selectBox-arrow"></span></a>
                <select class="form-control input-sm selectBox" style="display: none;">
                    <option value="">.input-sm</option>
                </select><a class="selectBox form-control input-sm selectBox-dropdown" title="" tabindex="0" style="width: 1138px; display: inline-block;"><span class="selectBox-label" style="width: 1105px;">.input-sm</span><span class="selectBox-arrow"></span></a>
            </div>
        </form>
    </div><!-- /.bs-example -->
    <div class="highlight">
        <pre><code class="html"><span class="nt">&lt;input</span> <span class="na">class=</span><span class="s">"form-control input-lg"</span> <span class="na">type=</span><span class="s">"text"</span> <span class="na">placeholder=</span><span class="s">".input-lg"</span><span class="nt">&gt;</span>
<span class="nt">&lt;input</span> <span class="na">class=</span><span class="s">"form-control"</span> <span class="na">type=</span><span class="s">"text"</span> <span class="na">placeholder=</span><span class="s">"Default input"</span><span class="nt">&gt;</span>
<span class="nt">&lt;input</span> <span class="na">class=</span><span class="s">"form-control input-sm"</span> <span class="na">type=</span><span class="s">"text"</span> <span class="na">placeholder=</span><span class="s">".input-sm"</span><span class="nt">&gt;</span>

<span class="nt">&lt;select</span> <span class="na">class=</span><span class="s">"form-control input-lg"</span><span class="nt">&gt;</span>...<span class="nt">&lt;/select&gt;</span>
<span class="nt">&lt;select</span> <span class="na">class=</span><span class="s">"form-control"</span><span class="nt">&gt;</span>...<span class="nt">&lt;/select&gt;</span>
<span class="nt">&lt;select</span> <span class="na">class=</span><span class="s">"form-control input-sm"</span><span class="nt">&gt;</span>...<span class="nt">&lt;/select&gt;</span>
</code>
        </pre>
    </div>

    <h3>Column sizing</h3>
    <p>Wrap inputs in grid columns, or any custom parent element, to easily enforce desired widths.</p>
    <div class="bs-example">
        <form role="form">
            <div class="row">
                <div class="col-sm-2 col-md-2">
                    <input type="text" class="form-control" placeholder=".col-xs-2">
                </div>
                <div class="col-sm-3 col-md-3">
                    <input type="text" class="form-control" placeholder=".col-xs-3">
                </div>
                <div class="col-sm-4 col-md-4">
                    <input type="text" class="form-control" placeholder=".col-xs-4">
                </div>
            </div>
        </form>
    </div><!-- /.bs-example -->
    <div class="highlight">
        <pre><code class="html"><span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"row"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"col-xs-2"</span><span class="nt">&gt;</span>
	<span class="nt">&lt;input</span> <span class="na">type=</span><span class="s">"text"</span> <span class="na">class=</span><span class="s">"form-control"</span> <span class="na">placeholder=</span><span class="s">".col-xs-2"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;/div&gt;</span>
  <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"col-xs-3"</span><span class="nt">&gt;</span>
	<span class="nt">&lt;input</span> <span class="na">type=</span><span class="s">"text"</span> <span class="na">class=</span><span class="s">"form-control"</span> <span class="na">placeholder=</span><span class="s">".col-xs-3"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;/div&gt;</span>
  <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"col-xs-4"</span><span class="nt">&gt;</span>
	<span class="nt">&lt;input</span> <span class="na">type=</span><span class="s">"text"</span> <span class="na">class=</span><span class="s">"form-control"</span> <span class="na">placeholder=</span><span class="s">".col-xs-4"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;/div&gt;</span>
</code>
        </pre>
    </div>

    <h2 id="forms-help-text">Help text</h2>
    <p>Block level help text for form controls.</p>
    <div class="bs-example">
        <form role="form">
            <input type="text" class="form-control">
            <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>
        </form>
    </div><!-- /.bs-example -->
    <div class="highlight">
        <pre><code class="html"><span class="nt">&lt;span</span> <span class="na">class=</span><span class="s">"help-block"</span><span class="nt">&gt;</span>A block of help text that breaks onto a new line and may extend beyond one line.<span class="nt">&lt;/span&gt;</span>
</code>
        </pre>
    </div>
</div>
