(function($, _, fwe) {

	var init = function() {
		var $this = $(this),
			elements = {
				$container: $this,
				$input: $this.find('input[type="hidden"]:first'),
				$urlInput: $this.find('input[type="hidden"].fw-option-type-upload-image-url'),
				$uploadButton: $this.find('p a'),
				$thumb: $this.find('.thumb')
			},
			templates = {
				thumb: {
					empty: $this.find('.thumb-template-empty').attr('data-template'),
					notEmpty: $this.find('.thumb-template-not-empty').attr('data-template')
				}
			},
			l10n = {
				buttonAdd: elements.$container.attr('data-l10n-button-add'),
				buttonEdit: elements.$container.attr('data-l10n-button-edit')
			},
			frame;

		var haveFilesDetails = elements.$container.attr('data-files-details') !== undefined;

		if (haveFilesDetails) {
			var parsedFilesDetails = JSON.parse(elements.$container.attr('data-files-details'));
		}

		var createFrame = function() {
				frame = wp.media({
					library: {
						type: haveFilesDetails ? parsedFilesDetails.mime_types : 'image'
					}
				});

			if(haveFilesDetails) {
				frame.on('content:render', function () {
					var $view = this.first().frame.views.get('.media-frame-uploader')[0];

					if(parsedFilesDetails.extra_mime_types.length > 0  && _.isArray(parsedFilesDetails.extra_mime_types)){
						_.each(parsedFilesDetails.extra_mime_types, function(mime_type){
							mOxie.Mime.addMimeType(mime_type);
						});
					}

					$view.options.uploader.plupload = {
						filters: {
							mime_types: [
								{
									title: 'Images',
									extensions: parsedFilesDetails.ext_files.join(',')
								}
							]
						}
					};
				});
			}

				frame.on('ready', function() {
					frame.modal.$el.addClass('fw-option-type-upload');
				});

				// opens the modal with the correct attachment selected
				frame.on('open', function() {
					var selection = frame.state().get('selection'),
						attatchmentId = elements.$input.val(),
						attachment = wp.media.attachment(attatchmentId);

					frame.reset();
					if (attachment.id) {
						selection.add(attachment);
					}
				});

				frame.on('select', function() {
					var attachment = frame.state().get('selection').first(),
						url, filename, compiled;

					if (attachment.get('sizes')) {
						url = attachment.get('sizes').thumbnail
								? attachment.get('sizes').thumbnail.url
								: attachment.get('sizes').full.url;
					} else {
						url = attachment.get('url');
					}
					filename = attachment.get('filename');
					compiled = _.template(
						templates.thumb.notEmpty,
						undefined,
						{variable: 'data'}
					)({src: url, alt: filename});

					elements.$uploadButton.text(l10n.buttonEdit);
					elements.$thumb
								.html(compiled)
								.attr({
									'data-attid': attachment.id,
									'data-origsrc': attachment.get('url')
								});
					elements.$urlInput.val(attachment.get('url'));
					elements.$input.val(attachment.id).trigger('change');
					elements.$container.removeClass('empty');

					fwe.trigger('fw:option-type:upload:change', {
						$element: elements.$container,
						attachment: attachment
					});
					elements.$container.trigger('fw:option-type:upload:change', {
						attachment: attachment
					});
				});
			};

		elements.$uploadButton.on('click', function(e) {
			e.preventDefault();

			if (!frame) {
				createFrame();
			}
			frame.open();
		});

		elements.$container.on('click', '.no-image-img, .thumb img', function() {
			elements.$uploadButton.trigger('click');
		});

		elements.$thumb.on('click', '.clear-uploads-thumb', function(e) {
			elements.$uploadButton.text(l10n.buttonAdd);
			elements.$thumb
						.html(templates.thumb.empty)
						.removeAttr('data-attid data-origsrc');
			elements.$input.val('').trigger('change');
			elements.$container.addClass('empty');

			fwe.trigger('fw:option-type:upload:clear', {$element: elements.$container});
			elements.$container.trigger('fw:option-type:upload:clear');

			e.preventDefault();
		});
	};

	fwe.on('fw:options:init', function(data) {
		data.$elements
			.find('.fw-option-type-upload.images-only:not(.fw-option-initialized)').each(init)
			.addClass('fw-option-initialized');
	});

})(jQuery, _, fwEvents);
