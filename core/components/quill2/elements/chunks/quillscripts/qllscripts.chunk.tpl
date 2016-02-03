<!-- Global Scripts -->
<script src="[[++quill_js_jquery]]"></script>
<!-- Include tether.min.js before bootstrap.js in order for tooltips to work -->
<script src="[[++quill_js_tether]]"></script>
<script src="[[++quill_js_bootstrap]]"></script>
<script src="[[++quill_js_unveil]]"></script>
<script>
  // Load Web fonts
  WebFontConfig = {
    google: {
      families: ['[[++quill_font_family]]']
    }
  };
  (function(d) {
    var wf = d.createElement('script'),
      s = d.scripts[0];
    wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js';
    s.parentNode.insertBefore(wf, s);
  })(document);
</script>
<!-- Page-specific Scripts -->
[[If?
  &subject=`[[*pagetitle]]`
  &operand=`Pattern Library`
  &then=`[[$qllPLScripts]]`
  &else=`[[qllPostScripts]]`
]]
