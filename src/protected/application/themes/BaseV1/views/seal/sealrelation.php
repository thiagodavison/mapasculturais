<?php
$action = preg_replace("#^(\w+/)#", "", $this->template);
$this->bodyProperties['ng-app'] = "entity.app";
$this->bodyProperties['ng-controller'] = "EntityController";

$this->addEntityToJs($relation);

if($this->isEditable()){
	$this->addEntityTypesToJs($relation);
}

$this->includeMapAssets();

$this->includeAngularEntityAssets($relation);

$entity = $relation->seal;

?>
<article class="main-content seal">
    <header class="main-content-header">
    <?php
    	if ($header = $entity->getFile('header')){
		    $style = "background-image: url({$header->transform('header')->url});";
		} else {
		    $style = "";
		} ?>

        <?php $this->applyTemplateHook('header-image','before'); ?>
		<div class="header-image js-imagem-do-header" style="<?php echo $style ?>">        
			<a class="btn btn-default edit js-open-editbox" href="<?php echo $app->createUrl('seal','printsealrelation',[$relation->id]);?>">Imprimir Certificado</a>
		</div>
		<?php $this->applyTemplateHook('header-image','after'); ?>
		        
        <?php $this->part('singles/entity-status', ['entity' => $entity]); ?>
        
        <div class="header-content">
            <?php $this->applyTemplateHook('header-content','begin'); ?>
            
            <?php $this->part('singles/avatar', ['entity' => $entity, 'default_image' => 'img/avatar--seal.png']); ?>
            
            <?php $this->part('singles/name', ['entity' => $entity]) ?>
            
            <?php $this->applyTemplateHook('header-content','end'); ?>
        </div>
        <!--.header-content-->
        <?php $this->applyTemplateHook('header-content','after'); ?>
    </header>
    <!--.main-content-header-->
    <?php $this->applyTemplateHook('header','after'); ?>
    
    <?php $this->applyTemplateHook('tabs','before'); ?>
    <ul class="abas clearfix clear">
        <?php $this->applyTemplateHook('tabs','begin'); ?>
        <li class="active"><a href="#sobre">Sobre</a></li>
        <?php $this->applyTemplateHook('tabs','end'); ?>
    </ul>
    <?php $this->applyTemplateHook('tabs','after'); ?>
    
    <div class="tabs-content">
        <?php $this->applyTemplateHook('tabs-content','begin'); ?>
        <div id="sobre" class="aba-content">
            <div class="ficha-spcultura">
                <p>
                    <span class="js-editable" data-edit="shortDescription" data-original-title="Descrição Curta" data-emptytext="Insira uma descrição curta" data-showButtons="bottom" data-tpl='<textarea maxlength="400"></textarea>'><?php echo $this->isEditable() ? $entity->shortDescription : nl2br($entity->shortDescription); ?></span>
                </p>
            </div>
            <!--.ficha-spcultura-->

            <?php if ( $entity->longDescription ): ?>
                <h3>Descrição</h3>
                <span class="descricao js-editable" data-edit="longDescription" data-original-title="Descrição do Selo" data-emptytext="Insira uma descrição do selo" ><?php echo $this->isEditable() ? $entity->longDescription : nl2br($entity->longDescription); ?></span>
            <?php endif; ?>
            <!--.descricao-->
        </div>
        <!-- #sobre -->
        
        <?php $this->applyTemplateHook('tabs-content','end'); ?>
    </div>
    <!-- .tabs-content -->
    <?php $this->applyTemplateHook('tabs-content','after'); ?>
	
	<br>
	<br>
	
	<br>
	<br>
	
	<br>
	<br>
	
	<!-- Entidade Relacionada -->
	<?php $entity = $relation->owner;?>
  	
    <header class="main-content-header">
        <?php $this->part('singles/header-image', ['entity' => $entity]); ?>
        
        <?php $this->part('singles/entity-status', ['entity' => $entity]); ?>
        
        <div class="header-content">
            <?php $this->applyTemplateHook('header-content','begin'); ?>
            
            <?php $this->part('singles/avatar', ['entity' => $entity, 'default_image' => 'img/avatar--seal.png']); ?>
            
            <?php $this->part('singles/name', ['entity' => $entity]) ?>
            
            <?php $this->applyTemplateHook('header-content','end'); ?>
        </div>
        <!--.header-content-->
        <?php $this->applyTemplateHook('header-content','after'); ?>
    </header>
    <!--.main-content-header-->
    <?php $this->applyTemplateHook('header','after'); ?>
    
    <?php $this->applyTemplateHook('tabs','before'); ?>
    <ul class="abas clearfix clear">
        <?php $this->applyTemplateHook('tabs','begin'); ?>
        <li class="active"><a href="#sobre">Sobre</a></li>
        <?php $this->applyTemplateHook('tabs','end'); ?>
    </ul>
    <?php $this->applyTemplateHook('tabs','after'); ?>
    
    <div class="tabs-content">
        <?php $this->applyTemplateHook('tabs-content','begin'); ?>
        <div id="sobre" class="aba-content">
            <div class="ficha-spcultura">
                <p>
                    <span class="js-editable" data-edit="shortDescription" data-original-title="Descrição Curta" data-emptytext="Insira uma descrição curta" data-showButtons="bottom" data-tpl='<textarea maxlength="400"></textarea>'><?php echo $this->isEditable() ? $entity->shortDescription : nl2br($entity->shortDescription); ?></span>
                </p>
            </div>
            <!--.ficha-spcultura-->

            <?php if ( $entity->longDescription ): ?>
                <h3>Descrição</h3>
                <span class="descricao js-editable" data-edit="longDescription" data-original-title="Descrição do Selo" data-emptytext="Insira uma descrição do selo" ><?php echo $this->isEditable() ? $entity->longDescription : nl2br($entity->longDescription); ?></span>
            <?php endif; ?>
            <!--.descricao-->
        </div>
        <!-- #sobre -->
        
        <?php $this->applyTemplateHook('tabs-content','end'); ?>
    </div>
    <!-- .tabs-content -->
    <?php $this->applyTemplateHook('tabs-content','after'); ?>
    
    <?php /*$this->part('owner', array('entity' => $entity, 'owner' => $entity->owner));*/ ?>
</article>
<div class="sidebar-left sidebar seal">

</div>
<div class="sidebar seal sidebar-right">
	
</div>