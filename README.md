looma-framework
-------------

#How to Make it Work

##The General Way

1. Download the zip or tarball. 
2. Extract and copy the contents to the Web Root `/var/www/`
3. Note that you copy the files and folders to web root. i.e., the web root should contain some folders with index.php in it
4. Change your apache Settings such that it allows .htaccess to override apache setting, and be sure the enable the mod rewrite module.
5. If this still shows error, make sure you have your apache server restarted


## The Git clone Way

1. Open Terminal: `git clone https://github.com/nootanghimire/looma-framework /var/www/`
2. Enable mod_rewrite, make sure .htaccess can override apache settings
3. If this still shows error, make sure you have your apache server restarted




Ongoing Documentation:
https://docs.google.com/document/d/1m4uPiC8A4rLV8cl8ggjCGs7JCa_rwJN93RSspJz4p98/edit?usp=sharing