function renderSchematic(container, schematic)
{
  var scale = 50;
  var app = new PIXI.Application(800, 600, {backgroundColor : 0xeeeeee});
  $(container).get().appendChild(app.view);
  var pixiContainer = new PIXI.Container();
  app.stage.addChild(pixiContainer);

  $.each(schematic.cells,function(i,e)
  {
    displayCell(e);
  });

  $.each(schematic.utilityConnections,function(i,e)
  {
    //displayUtilityConnection(e);
  });


  $.each(schematic.buildings,function(i,e)
  {
    displayBuilding(e);
  });


  // Center on the screen
  pixiContainer.x = (app.renderer.width - pixiContainer.width) / 2 - scale;
  pixiContainer.y = (app.renderer.height - pixiContainer.height) / 2;

}

function displayCell(cell)
{
  var bunny = new PIXI.Sprite(PIXI.Texture.fromImage('/images/50px-' + cell.element + '.png'));
  bunny.anchor.set(0,1);
  if (!cell.location_x) cell.location_x=0;
  if (!cell.location_y) cell.location_y=0;

  bunny.x = cell.location_x * scale;
  bunny.y = cell.location_y * scale*-1;
  container.addChild(bunny);



}

function displayUtilityConnection(cell)
{
  var bunny = new PIXI.Sprite(PIXI.Texture.fromImage('/images/50px-Sand_stone.png'));
  bunny.anchor.set(0,1);
      if (!cell.location_x) cell.location_x=0;
  if (!cell.location_y) cell.location_y=0;
  bunny.x = cell.location_x * scale;
  bunny.y = cell.location_y * scale*-1;
  container.addChild(bunny);
}

function displayUtilityConnection(cell)
{
  var bunny = new PIXI.Sprite(PIXI.Texture.fromImage('/images/50px-Sand_stone.png'));
  bunny.anchor.set(0,1);
      if (!cell.location_x) cell.location_x=0;
  if (!cell.location_y) cell.location_y=0;
  bunny.x = cell.location_x * scale;
  bunny.y = cell.location_y * scale*-1;
  container.addChild(bunny);
}

function displayBuilding(cell)
{
  var bunny = new PIXI.Sprite(PIXI.Texture.fromImage('/images/' + cell.id + '.png'));
  bunny.anchor.set(0,1);
      if (!cell.location_x) cell.location_x=0;
  if (!cell.location_y) cell.location_y=0;
  bunny.x = cell.location_x * scale;
  bunny.y = cell.location_y * scale*-1;
  container.addChild(bunny);
}
