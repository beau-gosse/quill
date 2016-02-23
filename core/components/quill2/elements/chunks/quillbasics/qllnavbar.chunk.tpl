<!-- Masthead -->
  <header id="masthead" role="banner" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
    <nav id="navbar" class="navbar navbar-light" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
      <div class="navbar-centered">
        <a class="navbar-brand" href="[[++site_url]]">
          <img src="[[++quill_logo]]" width="32" class="navbar-logo" alt="[[++quill_blog_name]]">
        </a>
      </div>
      <ul class="nav navbar-nav pull-xs-left">
        <li class="nav-item dropdown">
          <a href="#" title="Sections (alt+ctrl+n)" class="nav-link" aria-expanded="true" aria-haspopup="true" role="button" data-toggle="dropdown" accesskey="n">
            <svg class="svg-icon svg-icon-link" viewBox="0 0 20 20">
              <path fill="none" d="M1.683,3.39h16.676C18.713,3.39,19,3.103,19,2.749s-0.287-0.642-0.642-0.642H1.683
                    c-0.354,0-0.641,0.287-0.641,0.642S1.328,3.39,1.683,3.39z M1.683,7.879h11.545c0.354,0,0.642-0.287,0.642-0.641
                    s-0.287-0.642-0.642-0.642H1.683c-0.354,0-0.641,0.287-0.641,0.642S1.328,7.879,1.683,7.879z M18.358,11.087H1.683
                    c-0.354,0-0.641,0.286-0.641,0.641s0.287,0.642,0.641,0.642h16.676c0.354,0,0.642-0.287,0.642-0.642S18.713,11.087,18.358,11.087z
                     M11.304,15.576H1.683c-0.354,0-0.641,0.287-0.641,0.642s0.287,0.641,0.641,0.641h9.621c0.354,0,0.642-0.286,0.642-0.641
                    S11.657,15.576,11.304,15.576z">
              </path>
            </svg>
          </a>
          <!-- Site nav -->
          [[pdoMenu?
              &parents=`0`
              &displayStart=`1`
              &level=`2`
              &rowClass=`dropdown-item`
              &outerClass=`dropdown-menu dropdown-menu-dark`
              &tpl=`@INLINE <a href="[[+link]]" [[+attributes]][[+classes]]>[[+menutitle]]</a>`
              &tplOuter=`@INLINE <div[[+classes]]><h6 class="dropdown-header">[[+pagetitle]]</h6>[[+wrapper]]</div>`
              &sortby=`menuindex`
            ]]
            <!-- /.Site nav -->
        </li>
      </ul>
      [[SimpleSearchForm? &tpl=`qllSearchForm` &landing=`[[++quill2.search_page]]` &searchIndex=`term`]]
    </nav>
  </header>
  <!-- /.Masthead -->
