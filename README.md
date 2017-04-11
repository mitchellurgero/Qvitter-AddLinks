# Qvitter-AddLinks
AddLinks to Qvitter's Menu bar for logged in users!

## How to use:

1. Copy AddLinksPlugin.php to your plugin folder (Does NOT need it's own folder so long as its in the plugins folder)
2. Add the following to your config.php:

```
    addPlugin("AddLinks");
    $config['site']['AddLinks']['links'][0]["label"] = "Label Shown in Menu";
    $config['site']['AddLinks']['links'][0]["title"] = "Mouse hover title";
    $config['site']['AddLinks']['links'][0]["href"] = "http://example.com";
    //You can change the '0' to a '1' and so on for each link you want added to the Qvitter menu!
```  
3. That's it!

## Some notes: 
Due to the way Qvitter parses links, you MUST not include links to your own site UNLESS:
- It includes a file name or GET variable:

```
    https://yourinstance.com/path/to/file.txt
    https://yourinstance.com/social?var1=1
```

This is unfortunately the way it is. :( Sorry!
