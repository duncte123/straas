<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Straas</title>
    <style>
        @charset "UTF-8";
        @import 'https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.9.0-alpha2/katex.min.css';

        code {
            color: #c7254e;
            background-color: #f9f2f4;
            border-radius: 4px
        }

        code, kbd {
            padding: 2px 4px
        }

        kbd {
            color: #fff;
            background-color: #333;
            border-radius: 3px;
            box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .25)
        }

        kbd kbd {
            padding: 0;
            font-size: 100%;
            box-shadow: none
        }

        pre {
            display: block;
            margin: 0 0 10px;
            word-break: break-all;
            word-wrap: break-word;
            color: #333;
            background-color: #f5f5f5;
            border: 1px solid #ccc;
            border-radius: 4px
        }

        pre code {
            padding: 0;
            font-size: inherit;
            color: inherit;
            white-space: pre-wrap;
            background-color: transparent;
            border-radius: 0
        }

        table {
            background-color: transparent
        }

        th {
            text-align: left
        }

        .table > thead > tr > th {
            padding: 8px;
            line-height: 1.4285714;
            border-top: 1px solid #ddd
        }

        .table > thead > tr > td, .table > tbody > tr > th, .table > tbody > tr > td, .table > tfoot > tr > th, .table > tfoot > tr > td {
            padding: 8px;
            line-height: 1.4285714;
            vertical-align: top;
            border-top: 1px solid #ddd
        }

        .table > thead > tr > th {
            vertical-align: bottom;
            border-bottom: 2px solid #ddd
        }

        .table > caption + thead > tr:first-child > th, .table > caption + thead > tr:first-child > td, .table > colgroup + thead > tr:first-child > th, .table > colgroup + thead > tr:first-child > td, .table > thead:first-child > tr:first-child > th, .table > thead:first-child > tr:first-child > td {
            border-top: 0
        }

        .table > tbody + tbody {
            border-top: 2px solid #ddd
        }

        .table-condensed > thead > tr > th, .table-condensed > thead > tr > td, .table-condensed > tbody > tr > th, .table-condensed > tbody > tr > td, .table-condensed > tfoot > tr > th, .table-condensed > tfoot > tr > td {
            padding: 5px
        }

        .table-bordered > thead > tr > th, .table-bordered > thead > tr > td {
            border-bottom-width: 2px
        }

        .table-striped > tbody > tr:nth-child(odd) > td, .table-striped > tbody > tr:nth-child(odd) > th {
            background-color: #f9f9f9
        }

        .table-hover > tbody > tr:hover > td, .table-hover > tbody > tr:hover > th {
            background-color: #f5f5f5
        }

        table col[class*="col-"] {
            position: static;
            float: none;
            display: table-column
        }

        table td[class*="col-"], table th[class*="col-"] {
            position: static;
            float: none;
            display: table-cell
        }

        fieldset {
            border: 0;
            min-width: 0
        }

        legend {
            display: block;
            width: 100%;
            margin-bottom: 20px;
            font-size: 21px;
            line-height: inherit;
            color: #333;
            border-bottom: 1px solid #e5e5e5
        }

        label {
            display: inline-block;
            max-width: 100%;
            margin-bottom: 5px;
            font-weight: 700
        }

        input[type="radio"], input[type="checkbox"] {
            margin: 4px 0 0;
            margin-top: 1px \9;
            line-height: normal
        }

        input[type="file"] {
            display: block
        }

        input[type="range"] {
            display: block;
            width: 100%
        }

        select[multiple], select[size] {
            height: auto
        }

        input[type="file"]:focus, input[type="radio"]:focus, input[type="checkbox"]:focus {
            outline: thin dotted;
            outline: 5px auto -webkit-focus-ring-color;
            outline-offset: -2px
        }

        output {
            padding-top: 7px
        }

        input[type="date"], input[type="time"], input[type="datetime-local"], input[type="month"] {
            line-height: 34px;
            line-height: 1.4285714 \0
        }

        .radio label, .checkbox label {
            padding-left: 20px;
            margin-bottom: 0;
            font-weight: 400;
            cursor: pointer
        }

        .radio input[type="radio"], .radio-inline input[type="radio"], .checkbox input[type="checkbox"], .checkbox-inline input[type="checkbox"] {
            position: absolute;
            margin-left: -20px;
            margin-top: 4px \9
        }

        .input-group-addon input[type="radio"], .input-group-addon input[type="checkbox"] {
            margin-top: 0
        }

        .pagination > li {
            display: inline
        }

        .pagination > li > a, .pagination > li > span {
            position: relative;
            float: left;
            padding: 6px 12px;
            line-height: 1.4285714;
            text-decoration: none;
            color: #428bca;
            background-color: #fff;
            border: 1px solid #ddd;
            margin-left: -1px
        }

        .pagination > li:first-child > a, .pagination > li:first-child > span {
            margin-left: 0;
            border-bottom-left-radius: 4px;
            border-top-left-radius: 4px
        }

        .pagination > li:last-child > a, .pagination > li:last-child > span {
            border-bottom-right-radius: 4px;
            border-top-right-radius: 4px
        }

        .pagination > li > a:hover, .pagination > li > a:focus, .pagination > li > span:hover, .pagination > li > span:focus {
            color: #2a6496;
            background-color: #eee;
            border-color: #ddd
        }

        .pagination > .active > a, .pagination > .active > a:hover, .pagination > .active > a:focus, .pagination > .active > span, .pagination > .active > span:hover, .pagination > .active > span:focus {
            z-index: 2;
            color: #fff;
            background-color: #428bca;
            border-color: #428bca;
            cursor: default
        }

        .pagination > .disabled > span, .pagination > .disabled > span:hover, .pagination > .disabled > span:focus, .pagination > .disabled > a, .pagination > .disabled > a:hover, .pagination > .disabled > a:focus {
            color: #777;
            background-color: #fff;
            border-color: #ddd;
            cursor: not-allowed
        }

        .pagination-lg > li > a, .pagination-lg > li > span {
            padding: 10px 16px;
            font-size: 18px
        }

        .pagination-lg > li:first-child > a, .pagination-lg > li:first-child > span {
            border-bottom-left-radius: 6px;
            border-top-left-radius: 6px
        }

        .pagination-lg > li:last-child > a, .pagination-lg > li:last-child > span {
            border-bottom-right-radius: 6px;
            border-top-right-radius: 6px
        }

        .pagination-sm > li > a, .pagination-sm > li > span {
            padding: 5px 10px;
            font-size: 12px
        }

        .pagination-sm > li:first-child > a, .pagination-sm > li:first-child > span {
            border-bottom-left-radius: 3px;
            border-top-left-radius: 3px
        }

        .pagination-sm > li:last-child > a, .pagination-sm > li:last-child > span {
            border-bottom-right-radius: 3px;
            border-top-right-radius: 3px
        }

        *, *:before, *:after {
            box-sizing: border-box
        }

        html {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%
        }

        article, aside, details, figcaption, figure, footer, header, hgroup, main, nav, section, summary {
            display: block
        }

        audio, canvas, progress, video {
            display: inline-block;
            vertical-align: baseline
        }

        audio:not([controls]) {
            display: none;
            height: 0
        }

        [hidden], template {
            display: none
        }

        a {
            background: 0 0
        }

        a:active, a:hover {
            outline: 0
        }

        abbr[title] {
            border-bottom: 1px dotted
        }

        b, strong {
            font-weight: 700
        }

        dfn {
            font-style: italic
        }

        h1 {
            margin: .67em 0
        }

        mark {
            background: #ff0;
            color: #000
        }

        small {
            font-size: 80%
        }

        sub, sup {
            font-size: 75%;
            line-height: 0;
            position: relative;
            vertical-align: baseline
        }

        sup {
            top: -.5em
        }

        sub {
            bottom: -.25em
        }

        images {
            border: 0
        }

        svg:not(:root) {
            overflow: hidden
        }

        figure {
            margin: 1em 40px
        }

        hr {
            box-sizing: content-box;
            height: 0
        }

        pre {
            overflow: auto
        }

        code, kbd {
            font-size: 1em
        }

        code, kbd, pre, samp {
            font-family: monospace, monospace
        }

        samp {
            font-size: 1em
        }

        button, input, optgroup, select, textarea {
            color: inherit;
            font: inherit;
            margin: 0
        }

        button {
            overflow: visible
        }

        button, select {
            text-transform: none
        }

        button, html input[type="button"], input[type="reset"], input[type="submit"] {
            -webkit-appearance: button;
            cursor: pointer
        }

        button[disabled], html input[disabled] {
            cursor: default
        }

        button::-moz-focus-inner, input::-moz-focus-inner {
            border: 0;
            padding: 0
        }

        input {
            line-height: normal
        }

        input[type="checkbox"], input[type="radio"] {
            box-sizing: border-box;
            padding: 0;
            margin-right: 5px
        }

        input[type="number"]::-webkit-inner-spin-button, input[type="number"]::-webkit-outer-spin-button {
            height: auto
        }

        input[type="search"] {
            -webkit-appearance: textfield;
            box-sizing: content-box
        }

        input[type="search"]::-webkit-search-cancel-button, input[type="search"]::-webkit-search-decoration {
            -webkit-appearance: none
        }

        fieldset {
            border: 1px solid silver;
            margin: 0 2px;
            padding: .35em .625em .75em
        }

        legend {
            border: 0;
            padding: 0
        }

        textarea {
            overflow: auto
        }

        optgroup {
            font-weight: 700
        }

        table {
            border-collapse: collapse;
            border-spacing: 0
        }

        html {
            font-size: .875em;
            background: #fff;
            color: #373D49
        }

        html, body {
            font-family: Georgia, Cambria, serif;
            height: 100%
        }

        body {
            font-size: 1rem;
            font-weight: 400;
            line-height: 2rem
        }

        ul, ol {
            margin-bottom: .83999rem;
            padding-top: .16001rem
        }

        li {
            -webkit-font-feature-settings: 'kern' 1, 'onum' 1, 'liga' 1;
            font-feature-settings: 'kern' 1, 'onum' 1, 'liga' 1;
            margin-left: 1rem
        }

        li > ul, li > ol {
            margin-bottom: 0
        }

        p {
            padding-top: .66001rem;
            -webkit-font-feature-settings: 'kern' 1, 'onum' 1, 'liga' 1;
            font-feature-settings: 'kern' 1, 'onum' 1, 'liga' 1;
            margin-top: 0
        }

        p, pre {
            margin-bottom: 1.33999rem
        }

        pre {
            font-size: 1rem;
            padding: .66001rem 9.5px 9.5px;
            line-height: 2rem;
            background: -webkit-linear-gradient(top, #fff 0, #fff .75rem, #f5f7fa .75rem, #f5f7fa 2.75rem, #fff 2.75rem, #fff 4rem);
            background: linear-gradient(to bottom, #fff 0, #fff .75rem, #f5f7fa .75rem, #f5f7fa 2.75rem, #fff 2.75rem, #fff 4rem);
            background-size: 100% 4rem;
            border-color: #D3DAEA
        }

        blockquote {
            margin: 0
        }

        blockquote p {
            font-size: 1rem;
            margin-bottom: .33999rem;
            font-style: italic;
            padding: .66001rem 1rem 1rem;
            border-left: 3px solid #A0AABF
        }

        th, td {
            padding: 12px
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: "Source Sans Pro", "Helvetica Neue", Helvetica, Arial, sans-serif;
            -webkit-font-feature-settings: 'dlig' 1, 'liga' 1, 'lnum' 1, 'kern' 1;
            font-feature-settings: 'dlig' 1, 'liga' 1, 'lnum' 1, 'kern' 1;
            font-style: normal;
            font-weight: 600;
            margin-top: 0
        }

        h1 {
            line-height: 3rem;
            font-size: 2.0571429rem;
            margin-bottom: .21999rem;
            padding-top: .78001rem
        }

        h2 {
            font-size: 1.953125rem;
            margin-bottom: .1835837rem;
            padding-top: .8164163rem
        }

        h2, h3 {
            line-height: 3rem
        }

        h3 {
            font-size: 1.6457143rem;
            margin-bottom: .07599rem;
            padding-top: .92401rem
        }

        h4 {
            font-size: 1.5625rem;
            margin-bottom: .546865rem;
            padding-top: .453135rem
        }

        h5 {
            font-size: 1.25rem;
            margin-bottom: -.56251rem;
            padding-top: .56251rem
        }

        h6 {
            font-size: 1rem;
            margin-bottom: -.65001rem;
            padding-top: .65001rem
        }

        a {
            cursor: pointer;
            color: #35D7BB;
            text-decoration: none
        }

        a:hover, a:focus {
            border-bottom-color: #35D7BB;
            color: #dff9f4
        }

        img {
            height: auto;
            max-width: 100%
        }

        .splashscreen p {
            font-size: 1.25rem;
            padding-top: .56251rem;
            font-family: "Source Sans Pro", "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-weight: 400;
            text-align: center;
            max-width: 500px;
            margin: 0 auto;
            color: #FFF
        }

        .icon svg {
            display: inline-block;
            margin-left: auto;
            margin-right: auto
        }

        .icon-preview svg {
            width: 19px;
            height: 12px
        }

        .icon-settings svg {
            width: 18px;
            height: 18px
        }

        .navbar-brand svg {
            width: 85px;
            height: 11px
        }

        .menu a {
            border: 0;
            color: #A0AABF;
            font-family: "Source Sans Pro", "Helvetica Neue", Helvetica, Arial, sans-serif;
            outline: none;
            text-transform: uppercase
        }

        .menu a:hover {
            color: #35D7BB
        }

        .menu .menu-item > a {
            display: block;
            font-size: 12px;
            height: 51px;
            letter-spacing: 1px;
            line-height: 51px;
            padding: 0 24px
        }

        .menu .menu-item.open > a {
            background-color: #1D212A
        }

        .menu .menu-item-icon > a {
            height: auto;
            padding: 0
        }

        .menu .menu-item-icon:hover > a {
            background-color: transparent
        }

        .menu .menu-link.open i {
            background-color: #1D212A
        }

        .menu .menu-link.open g {
            fill: #35D7BB
        }

        .menu-sidebar .menu-item.open > a {
            background-color: #373D49
        }

        .menu-sidebar > .menu-item:hover .dropdown a, .menu-sidebar > .menu-item:hover .settings a {
            background-color: transparent
        }

        .menu-sidebar .menu-link > span {
            float: left
        }

        .dropdown li {
            margin: 32px 0;
            padding: 0 0 0 32px
        }

        .dropdown li, .settings li {
            line-height: 1
        }

        .sidebar-list li {
            line-height: 1;
            margin: 32px 0;
            padding: 0 0 0 32px
        }

        .dropdown a {
            color: #D0D6E2
        }

        .dropdown a, .settings a, .sidebar-list a {
            display: block;
            text-transform: none
        }

        .sidebar-list a {
            color: #D0D6E2
        }

        .dropdown a:after, .settings a:after, .sidebar-list a:after {
            content: "";
            display: table;
            clear: both
        }

        .dropdown.documents li, .documents.settings li, .sidebar-list.documents li {
            background-image: url("../img/icons/file.svg");
            background-position: 240px center;
            background-repeat: no-repeat;
            background-size: 14px 16px;
            padding: 3px 32px
        }

        .dropdown.documents li:last-child, .documents.settings li:last-child, .sidebar-list.documents li:last-child {
            margin-bottom: 1rem
        }

        .dropdown.documents li.active a, .documents.settings li.active a, .sidebar-list.documents li.active a {
            color: #35D7BB
        }

        .settings form {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-direction: row;
            flex-direction: row;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between
        }

        .settings input {
            width: 20%
        }

        .settings a {
            font-size: 1.25rem;
            font-family: "Source Sans Pro", "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-weight: 400;
            -webkit-font-smoothing: antialiased;
            line-height: 28px;
            color: #D0D6E2
        }

        .settings a:after {
            content: "";
            display: table;
            clear: both
        }

        .settings a:hover {
            color: #35D7BB
        }

        .settings li {
            border-bottom: 1px solid #4F535B;
            margin: 0;
            padding: 16px 0
        }

        .settings li:last-child {
            border-bottom: none
        }

        .brand:hover g {
            fill: #35D7BB
        }

        .toggle span:after, .toggle span:before {
            content: '';
            left: 0;
            position: absolute;
            top: -6px
        }

        .toggle span:after {
            top: 6px
        }

        .toggle span {
            display: block;
            position: relative
        }

        .toggle span, .toggle span:after, .toggle span:before {
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            background-color: #D3DAEA;
            height: 2px;
            -webkit-transition: all .3s;
            transition: all .3s;
            width: 20px
        }

        .open-menu .toggle span {
            background-color: transparent
        }

        .open-menu .toggle span:before {
            -webkit-transform: rotate(45deg) translate(3px, 3px);
            transform: rotate(45deg) translate(3px, 3px)
        }

        .open-menu .toggle span:after {
            -webkit-transform: rotate(-45deg) translate(5px, -6px);
            transform: rotate(-45deg) translate(5px, -6px)
        }

        .words span, .characters span {
            color: #000
        }

        .switch input {
            display: none
        }

        .switch small {
            display: inline-block;
            cursor: pointer;
            padding: 0 24px 0 0;
            -webkit-transition: all ease .2s;
            transition: all ease .2s;
            background-color: #2B2F36;
            border-color: #2B2F36
        }

        .switch small, .switch small:before {
            border-radius: 30px;
            box-shadow: inset 0 0 2px 0 #14171F
        }

        .switch small:before {
            display: block;
            content: '';
            width: 28px;
            height: 28px;
            background: #fff
        }

        .switch.checked small {
            padding-right: 0;
            padding-left: 24px;
            background-color: #35D7BB;
            box-shadow: none
        }

        .modal--dillinger ul {
            list-style-type: disc;
            margin: 1rem 0;
            padding: 0 0 0 1rem
        }

        .modal--dillinger li {
            padding: 0;
            margin: 0
        }

        .pagination--dillinger li {
            -webkit-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
            text-align: center
        }

        .pagination--dillinger li:first-child > a, .pagination--dillinger li.disabled > a, .pagination--dillinger li.disabled > a:hover, .pagination--dillinger li.disabled > a:focus, .pagination--dillinger li > a {
            background-color: transparent;
            border-color: #4F535B;
            border-right-color: transparent
        }

        .pagination--dillinger li.active > a, .pagination--dillinger li.active > a:hover, .pagination--dillinger li.active > a:focus {
            border-color: #4A5261;
            background-color: #4A5261;
            color: #fff
        }

        .pagination--dillinger li > a {
            float: none;
            color: #fff;
            width: 100%;
            display: block;
            text-align: center;
            margin: 0;
            border-right-color: transparent;
            padding: 6px
        }

        .pagination--dillinger li > a:hover, .pagination--dillinger li > a:focus {
            border-color: #35D7BB;
            background-color: #35D7BB;
            color: #fff
        }

        .pagination--dillinger li:last-child a {
            border-color: #4F535B
        }

        .pagination--dillinger li:first-child a {
            border-right-color: transparent
        }

        #_default_ a::before {
            color: #A0AABF
        }

        #_default_ img {
            display: none
        }

        #_default_ a {
            color: #35d7bb;
            text-decoration: none
        }

        #_default_ a:hover {
            color: #8ae8d8
        }

        #_default_ a:before {
            position: relative;
            top: 0;
            padding: 5px;
            color: #a0aabf;
            content: "Ad";
            text-transform: uppercase;
            font-size: 8px;
            font-family: Verdana, sans-serif
        }

        body {
            max-width: 1024px;
            margin: 0 auto;
            overflow: auto;
            padding: 2%
        }

        .preview-html a {
            color: #A0AABF;
            text-decoration: underline
        }

        @media screen and (min-width: 27.5em) {
            html {
                font-size: .875em
            }

            body {
                font-size: 1rem
            }

            ul, ol {
                margin-bottom: .83999rem;
                padding-top: .16001rem
            }

            p {
                padding-top: .66001rem
            }

            p, pre {
                margin-bottom: 1.33999rem
            }

            pre, blockquote p {
                font-size: 1rem;
                padding-top: .66001rem
            }

            blockquote p {
                margin-bottom: .33999rem
            }

            h1 {
                font-size: 2.0571429rem;
                margin-bottom: .21999rem;
                padding-top: .78001rem
            }

            h2 {
                font-size: 1.953125rem;
                margin-bottom: .1835837rem;
                padding-top: .8164163rem
            }

            h3 {
                font-size: 1.6457143rem;
                margin-bottom: .07599rem;
                padding-top: .92401rem
            }

            h4 {
                font-size: 1.5625rem;
                margin-bottom: .546865rem;
                padding-top: .453135rem
            }

            h5 {
                font-size: 1.25rem;
                margin-bottom: -.56251rem;
                padding-top: .56251rem
            }

            h6 {
                font-size: 1rem;
                margin-bottom: -.65001rem;
                padding-top: .65001rem
            }

            .splashscreen p {
                font-size: 1.25rem;
                margin-bottom: 1.43749rem;
                padding-top: .56251rem
            }

        }

        @media screen and (min-width: 46.25em) {
            html {
                font-size: .875em
            }

            body {
                font-size: 1rem
            }

            ul, ol {
                margin-bottom: .83999rem;
                padding-top: .16001rem
            }

            p {
                padding-top: .66001rem
            }

            p, pre {
                margin-bottom: 1.33999rem
            }

            pre, blockquote p {
                font-size: 1rem;
                padding-top: .66001rem
            }

            blockquote p {
                margin-bottom: .33999rem
            }

            h1 {
                font-size: 2.0571429rem;
                margin-bottom: .21999rem;
                padding-top: .78001rem
            }

            h2 {
                font-size: 1.953125rem;
                margin-bottom: .1835837rem;
                padding-top: .8164163rem
            }

            h3 {
                font-size: 1.6457143rem;
                margin-bottom: .07599rem;
                padding-top: .92401rem
            }

            h4 {
                font-size: 1.5625rem;
                margin-bottom: .546865rem;
                padding-top: .453135rem
            }

            h5 {
                font-size: 1.25rem;
                margin-bottom: -.56251rem;
                padding-top: .56251rem
            }

            h6 {
                font-size: 1rem;
                margin-bottom: -.65001rem;
                padding-top: .65001rem
            }

            .splashscreen p {
                font-size: 1.25rem;
                margin-bottom: 1.43749rem;
                padding-top: .56251rem
            }

            .settings a {
                font-size: 1.25rem
            }

        }

        @media screen and (min-width: 62.5em) {
            html {
                font-size: .875em
            }

            body {
                font-size: 1rem
            }

            ul, ol {
                margin-bottom: .83999rem;
                padding-top: .16001rem
            }

            p {
                padding-top: .66001rem
            }

            p, pre {
                margin-bottom: 1.33999rem
            }

            pre, blockquote p {
                font-size: 1rem;
                padding-top: .66001rem
            }

            blockquote p {
                margin-bottom: .33999rem
            }

            h1 {
                font-size: 2.0571429rem;
                margin-bottom: .21999rem;
                padding-top: .78001rem
            }

            h2 {
                font-size: 1.953125rem;
                margin-bottom: .1835837rem;
                padding-top: .8164163rem
            }

            h3 {
                font-size: 1.6457143rem;
                margin-bottom: .07599rem;
                padding-top: .92401rem
            }

            h4 {
                font-size: 1.5625rem;
                margin-bottom: .546865rem;
                padding-top: .453135rem
            }

            h5 {
                font-size: 1.25rem;
                margin-bottom: -.56251rem;
                padding-top: .56251rem
            }

            h6 {
                font-size: 1rem;
                margin-bottom: -.65001rem;
                padding-top: .65001rem
            }

            .splashscreen p {
                font-size: 1.25rem;
                margin-bottom: 1.43749rem;
                padding-top: .56251rem
            }

            .settings a {
                font-size: 1.25rem
            }

        }

        @media screen and (min-width: 87.5em) {
            html {
                font-size: .875em
            }

            body {
                font-size: 1rem
            }

            ul, ol {
                margin-bottom: .83999rem;
                padding-top: .16001rem
            }

            p {
                padding-top: .66001rem
            }

            p, pre {
                margin-bottom: 1.33999rem
            }

            pre, blockquote p {
                font-size: 1rem;
                padding-top: .66001rem
            }

            blockquote p {
                margin-bottom: .33999rem
            }

            h1 {
                font-size: 2.0571429rem;
                margin-bottom: .21999rem;
                padding-top: .78001rem
            }

            h2 {
                font-size: 1.953125rem;
                margin-bottom: .1835837rem;
                padding-top: .8164163rem
            }

            h3 {
                font-size: 1.6457143rem;
                margin-bottom: .07599rem;
                padding-top: .92401rem
            }

            h4 {
                font-size: 1.5625rem;
                margin-bottom: .546865rem;
                padding-top: .453135rem
            }

            h5 {
                font-size: 1.25rem;
                margin-bottom: -.56251rem;
                padding-top: .56251rem
            }

            h6 {
                font-size: 1rem;
                margin-bottom: -.65001rem;
                padding-top: .65001rem
            }

            .splashscreen p {
                font-size: 1.25rem;
                margin-bottom: 1.43749rem;
                padding-top: .56251rem
            }

        }

        @media (min-width: 768px) {

            .form-inline .radio label, .form-inline .checkbox label {
                padding-left: 0
            }

            .form-inline .radio input[type="radio"], .form-inline .checkbox input[type="checkbox"] {
                position: relative;
                margin-left: 0
            }

        }

        @media (min-width: 992px) {
        }

        @media screen and (max-width: 1200px) {

        }

        @media screen and (max-width: 1100px) {

        }

        @media screen and (max-width: 1000px) {

        }

        @media screen and (max-width: 900px) {
        }

        @media screen and (max-width: 767px) {

            .table-responsive > .table > thead > tr > th, .table-responsive > .table > thead > tr > td, .table-responsive > .table > tbody > tr > th, .table-responsive > .table > tbody > tr > td, .table-responsive > .table > tfoot > tr > th, .table-responsive > .table > tfoot > tr > td {
                white-space: nowrap
            }

            .table-responsive > .table-bordered > thead > tr > th:first-child, .table-responsive > .table-bordered > thead > tr > td:first-child, .table-responsive > .table-bordered > tbody > tr > th:first-child, .table-responsive > .table-bordered > tbody > tr > td:first-child, .table-responsive > .table-bordered > tfoot > tr > th:first-child, .table-responsive > .table-bordered > tfoot > tr > td:first-child {
                border-left: 0
            }

            .table-responsive > .table-bordered > thead > tr > th:last-child, .table-responsive > .table-bordered > thead > tr > td:last-child, .table-responsive > .table-bordered > tbody > tr > th:last-child, .table-responsive > .table-bordered > tbody > tr > td:last-child, .table-responsive > .table-bordered > tfoot > tr > th:last-child, .table-responsive > .table-bordered > tfoot > tr > td:last-child {
                border-right: 0
            }

            .table-responsive > .table-bordered > tbody > tr:last-child > th, .table-responsive > .table-bordered > tbody > tr:last-child > td, .table-responsive > .table-bordered > tfoot > tr:last-child > th, .table-responsive > .table-bordered > tfoot > tr:last-child > td {
                border-bottom: 0
            }
        }

        @media screen and (max-width: 720px) {

        }

        @media screen and (max-width: 620px) {

        }

        @media screen and (max-width: 520px) {
        }

        @media screen and (max-width: 460px) {
        }

        @media screen and (max-width: 46.1875em) {

        }</style>
</head>
<body>
<h1><a id="Straas_0"></a>Straas</h1>
<p>Strings as a service</p>

</body>
</html>
