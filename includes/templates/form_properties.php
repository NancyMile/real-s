<fieldset>
    <legend>Genral Info</legend>
    <label for="title">Title</label>
    <input type="text" name="title" id="title" placeholder="title" value="<?php echo sanitizingHtml($property->title); ?>">
    <label for="price">Price</label>
    <input type="number" name="price" id="price" placeholder="price" value="<?php echo sanitizingHtml($property->price); ?>">
    <label for="title">Image</label>
    <input type="file" id="image" accept="image/jpeg,image/png" name="image">
    <?php if($property->image): ?>
        <img src="/images/<?php echo $property->image;?>" alt="image"  class="image-small">
    <?php endif; ?>
    <label for="description">Description</label>
    <textarea id="description" name="description"><?php echo sanitizingHtml($property->description); ?></textarea>
</fieldset>
<fieldset>
    <legend>Property Info</legend>
    <label for="rooms">Rooms</label>
    <input type="number" id="rooms" name="rooms" min="1" max="9" placeholder="Eg: 3" value="<?php echo sanitizingHtml($property->rooms); ?>">
    <label for="bathrooms">Bathrooms</label>
    <input type="number" id="bathrooms" name="bathrooms" min="1" max="4" placeholder="Eg: 3" value="<?php echo sanitizingHtml($property->bathrooms); ?>">
    <label for="garages">Garages</label>
    <input type="number" id="garages" name="garages" min="1" max="3" placeholder="Eg: 3" value="<?php echo sanitizingHtml($property->garages); ?>">
</fieldset>
<fieldset>
    <legend>Seller Info</legend>
    <label for="name">Name</label>
    <select name="seller_id">
        <option value="" selected disabled>-- Select --</option>
        <?php while($seller = mysqli_fetch_assoc($result)) : ?>
            <option <?php echo $seller['id'] === $sellerId ? 'selected': ''; ?> value="<?php echo $seller['id']?>"><?php echo $seller['name'].' '.$seller['lastname'] ?></option>
        <?php endwhile; ?>
    </select>
</fieldset>
