<!DOCTYPE html>
<html>
<head>
  <title>Basic WebViewer</title>
</head>

<!-- Import WebViewer as a script tag -->

<script src="../Util/Js/webviewer.min.js"></script>
<body>

  <div id="viewer" style="width: 1024px; height: 600px; margin: 0 auto;"></div>
  <script>
  WebViewer({
    path: 'lib', // path to the PDFTron 'lib' folder on your server
    licenseKey: 'Insert commercial license key here after purchase',
    initialDoc: '../assets/uploads/1626191940_Descripcion del proyecto Agencia Aduanal Alfonso Bres.pdf',
    // initialDoc: '/path/to/my/file.pdf', // You can also use documents on your server
  }, document.getElementById('viewer'))
  .then(instance => {
    const docViewer = instance.docViewer;
    const annotManager = instance.annotManager;
    // call methods from instance, docViewer and annotManager as needed

    // you can also access major namespaces from the instance as follows:
    // const Tools = instance.Tools;
    // const Annotations = instance.Annotations;

    docViewer.on('documentLoaded', () => {
      // call methods relating to the loaded document
    });
  });
</script>

</body>
</html>