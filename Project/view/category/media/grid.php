<?php $medias = $this->getMedias(); ?>


    <form action="<?php echo $this->getUrl('save','category_media') ?>" method="POST" align=center>
        <input type="submit" value="update">
        <button><a href="<?php echo $this->getUrl('grid','category',[],true); ?>">Cancel</a></button>
        <table border=3 align=center width=100% cellspacing=4>
            <tr>
                <th>Image Id</th>
                <th>Category Id</th>
                <th>Name</th>
                <th>Base</th>
                <th>Thumb</th>
                <th>Small</th>
                <th>Gallery</th>
                <th>Remove</th>
            </tr>
            <?php if(!$medias): ?>
                <tr>
                    <td colspan=8>No Records Found</td>
                </tr>
            <?php else: ?>
            <?php foreach ($medias as $media): ?>
            <tr>
                <td><?php echo $media->mediaId ?></td>
                <td><?php echo $media->categoryId ?></td>
                <td><?php echo $media->name ?></td>
                <td>
                    <input type="radio" name="media[base]" value = "<?php echo $media->mediaId ?>" <?php echo $this->selected($media->mediaId,'base'); ?> >
                </td>
                <td>
                    <input type="radio" name="media[thumb]" value = "<?php echo $media->mediaId ?>" <?php echo $this->selected($media->mediaId,'thumb'); ?> >
                </td>
                <td>
                    <input type="radio" name="media[small]" value = "<?php echo $media->mediaId ?>" <?php echo $this->selected($media->mediaId,'small'); ?> >
                </td>
                <td>
                    <input type="checkbox" name="media[gallery][]" value = "<?php echo $media->mediaId ?>" <?php echo $media->gallery == 1 ? 'checked' : ''; ?>>
                </td>
                <td>
                    <input type="checkbox" name="media[remove][]" value = "<?php echo $media->mediaId ?>" >
                </td>
            </tr>
            <?php endforeach; ?>
            <?php  endif; ?>
        </table>
    </form>

    <form action="<?php echo $this->getUrl('save','category_media') ?>" method="POST" enctype="multipart/form-data">
        <input type="file" name="name">
        <input type="submit" value="Upload">
    </form>


