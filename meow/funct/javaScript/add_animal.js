  const pickerOpts = {
    types: [
      {
        description: 'Images',
        accept: {
          'image/*': ['.png', '.gif', '.jpeg', '.jpg']
        }
      },
    ],
    excludeAcceptAllOption: true,
    multiple: false
  };
  
  async function getTheFile() {
    // open file picker
    [fileHandle] = await window.showOpenFilePicker(pickerOpts);
  }


