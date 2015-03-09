.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _admin-manual:

Administrator Manual
====================

Installation
------------

To install the extension, perform the following steps:

#. Go to the Extension Manager
#. Install the extension
#. Nothing more to do. The checkbos will be available, now.

.. _admin-configuration:

Configuration
-------------

You will have to edit the EXT:news partials, to use the feature of this Extension.

The partial "Detail/FalMediaImage.html" may be modified like this (only modify local copies of resources to not overwrite your changes when updating the Extension!):

.. code-block:: html

	<f:if condition="{mediaElement.jhMagnificpopupMfponly}">
		<f:then>
			<div class="mediaelement mediaelement-image" style="display: none;">
				<f:if condition="{settings.detail.media.image.lightbox}">
					<f:then>
						<a rel="{settings.detail.media.image.lightbox}" title="{mediaElement.caption}" href="{f:uri.image(src:'{mediaElement.uid}' treatIdAsReference:1 maxWidth:'800')}"></a>
					</f:then>
				</f:if>
			</div>
		</f:then>
		<f:else>
			<div class="mediaelement mediaelement-image">
				<f:if condition="{settings.detail.media.image.lightbox}">
					<f:then>
						<a rel="{settings.detail.media.image.lightbox}" title="{mediaElement.caption}" href="{f:uri.image(src:'{mediaElement.uid}' treatIdAsReference:1 maxWidth:'800')}">
							<f:image src="{mediaElement.uid}" treatIdAsReference="1" title="{mediaElement.originalResource.title}" alt="{mediaElement.originalResource.alternative}" maxWidth="{settings.detail.media.image.maxWidth}" maxHeight="{settings.detail.media.image.maxHeight}" />
						</a>
					</f:then>
					<f:else>
						<f:image src="{mediaElement.uid}" treatIdAsReference="1" title="{mediaElement.originalResource.title}" alt="{mediaElement.originalResource.alternative}" maxWidth="{settings.detail.media.image.maxWidth}" maxHeight="{settings.detail.media.image.maxHeight}" />
					</f:else>
				</f:if>
			</div>
			<f:if condition="{mediaElement.originalResource.description}">
				<p class="news-img-caption">
					{mediaElement.originalResource.description}
				</p>
			</f:if>
		</f:else>
	</f:if>

The first if and its then has been added and is essential to get intended result. The else-part is the original one by EXT:news.


Display image-description
^^^^^^^^^^^^^^^^^^^^^^^^^

To display the image-description (-caption) below the image in Magnific Popup, use this partial instead (changed value of title-attribute):

.. code-block:: html
	:emphasize-lines: 6,15

	<f:if condition="{mediaElement.jhMagnificpopupMfponly}">
		<f:then>
			<div class="mediaelement mediaelement-image" style="display: none;">
				<f:if condition="{settings.detail.media.image.lightbox}">
					<f:then>
						<a rel="{settings.detail.media.image.lightbox}" title="{mediaElement.originalResource.description}" href="{f:uri.image(src:'{mediaElement.uid}' treatIdAsReference:1 maxWidth:'800')}"></a>
					</f:then>
				</f:if>
			</div>
		</f:then>
		<f:else>
			<div class="mediaelement mediaelement-image">
				<f:if condition="{settings.detail.media.image.lightbox}">
					<f:then>
						<a rel="{settings.detail.media.image.lightbox}" title="{mediaElement.originalResource.description}" href="{f:uri.image(src:'{mediaElement.uid}' treatIdAsReference:1 maxWidth:'800')}">
							<f:mage src="{mediaElement.uid}" treatIdAsReference="1" title="{mediaElement.originalResource.title}" alt="{mediaElement.originalResource.alternative}" maxWidth="{settings.detail.media.image.maxWidth}" maxHeight="{settings.detail.media.image.maxHeight}" />
						</a>
					</f:then>
					<f:else>
						<f:image src="{mediaElement.uid}" treatIdAsReference="1" title="{mediaElement.originalResource.title}" alt="{mediaElement.originalResource.alternative}" maxWidth="{settings.detail.media.image.maxWidth}" maxHeight="{settings.detail.media.image.maxHeight}" />
					</f:else>
				</f:if>
			</div>
			<f:if condition="{mediaElement.originalResource.description}">
				<p class="news-img-caption">
					{mediaElement.originalResource.description}
				</p>
			</f:if>
		</f:else>
	</f:if>
