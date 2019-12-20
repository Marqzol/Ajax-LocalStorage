# **AJAX Y LOCALSTORAGE**
Los siguientes archivos se encargan de recuperar el valor del campo contraseña (en index.php) y, mediante una petición Ajax al servidor (archivo applyHash.php) encriptarla con un hash usando el algoritmo Blowfish, para después recuperar dicha contraseña e introducirla en el LocalStorage.
        
Utilizaremos Ajax de manera asíncrona para que no introduzca en el LocalStorage ningún valor hasta que no tengamos devuelta la contraseña encriptada con su hash.