# the-mage
Automatically exported from code.google.com/p/the-mage (All credit where it is due, I simply only exported this to a github repo since Google code will soon close. -mb) Original Wiki Docs below:

------------------------------------------------------------------------
This css stylesheet: custom.css, customizes the Magento Admin Panel

This CSS style-sheet: custom.css, customizes the Magento Admin Panel. Enlarging the font-size makes the UI more suitable for larger screens. When spending much time making a web shop, I had the urge to make the Magento Admin Panel UI a bit prettier: better fonts, CSS-3 rounded corners to lose a bit of that “boxed-in-feel”, nicer colours, gradients and so on. And this I would like to share.

------------------------------------------------------------------------

<b>How to best integrate custom.css in Magento</b>

One can easily be tempted to download this `custom.css` file and then directly overwrite the `custom.css` file in the `skin/adminhtml/default/default` directory. 
Please <b>resist this urge</b>, you will regret this later, for it will not survive any updates of Magento. 
The easiest way to build <b>your own custom admin theme module</b> in Magento is: 

1. Download <a href="http://inchoo.net/author/weiler/">Ivan Weiler’s</a> admintheme_example.rar from inchoo.net. 
2. Follow the instructions on this <a href="http://inchoo.net/magento/custom-admin-theme-in-magento/">blog post</a>: where to copy the files. 
3. Make also a custom theme folder in: skin/adminhtml/default/ -> your-theme 
4. Rename the `custom-0.1.css` file to `custom.css`, and copy the file to the your-theme folder; the one that you just created. 
5. When done correctly a “Admin Theme” option will appear in <i>Magento Admin Panel -> System -> Configuration -> General -> Design</i> (Default Config scope). Just fill in the name of your theme there.

<b>Extra options</b>

- Create an images folder in your-theme folder. For the `custom.css` stylesheet I replaced some of the default UI icons with some fresher looking ones. They're from an iconset named <a href="http://p.yusukekamiyamane.com/">Fugue icons</a>, and made by Yusuke Kamiyamane: exceptionally well-thought-out and craftily executed icons.
- Create a type folder in your-theme folder. The <a href="http://www.fontsquirrel.com/fonts/Luxi-Sans">Luxi-Sans@fontface kit</a> that is referred to in the stylesheet can be downloaded at fontsquirrel.
- Download a light grey diagonal-striped tiling background-image

<b>Details</b>

sample 0.1.css Current and first version: 0.1 - March 2011 by <a href="http://atelierbramdehaan.nl/">Atelier Bram de Haan</a> - <a href="https://github.com/atelierbram">Github</a>
