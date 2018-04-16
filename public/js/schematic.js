function renderSchematic(container, schematic)
{
  window.pixiApp = {'scale': 50,
  'app' : new PIXI.Application(800, 600, {backgroundColor : 0xeeeeee}),
  'container':new PIXI.Container()

};
  $(container).get(0).appendChild(window.pixiApp.app.view);
  window.pixiApp.app.stage.addChild(window.pixiApp.container);

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
  window.pixiApp.container.x = (window.pixiApp.app.renderer.width - window.pixiApp.container.width) / 2 - window.pixiApp.scale;
  window.pixiApp.container.y = (window.pixiApp.app.renderer.height - window.pixiApp.container.height) / 2;

}

function displayCell(cell)
{
  var bunny = new PIXI.Sprite(PIXI.Texture.fromImage('/oni-schematics/public/images/50px-' + cell.element + '.png'));
  bunny.anchor.set(0,1);
  if (!cell.location_x) cell.location_x=0;
  if (!cell.location_y) cell.location_y=0;

  bunny.x = cell.location_x * window.pixiApp.scale;
  bunny.y = cell.location_y * window.pixiApp.scale*-1;
  window.pixiApp.container.addChild(bunny);



}

function displayUtilityConnection(cell)
{
  var bunny = new PIXI.Sprite(PIXI.Texture.fromImage('/oni-schematics/public/images/50px-Sand_stone.png'));
  bunny.anchor.set(0,1);
      if (!cell.location_x) cell.location_x=0;
  if (!cell.location_y) cell.location_y=0;
  bunny.x = cell.location_x * window.pixiApp.scale;
  bunny.y = cell.location_y * window.pixiApp.scale*-1;
  window.pixiApp.container.addChild(bunny);
}

function displayUtilityConnection(cell)
{
  var bunny = new PIXI.Sprite(PIXI.Texture.fromImage('/oni-schematics/public/images/50px-Sand_stone.png'));
  bunny.anchor.set(0,1);
      if (!cell.location_x) cell.location_x=0;
  if (!cell.location_y) cell.location_y=0;
  bunny.x = cell.location_x * window.pixiApp.scale;
  bunny.y = cell.location_y * window.pixiApp.scale*-1;
  window.pixiApp.container.addChild(bunny);
}

function displayBuilding(cell)
{
  var bunny = new PIXI.Sprite(PIXI.Texture.fromImage('/oni-schematics/public/images/' + cell.id + '.png'));
  bunny.anchor.set(0,1);
      if (!cell.location_x) cell.location_x=0;
  if (!cell.location_y) cell.location_y=0;
  bunny.x = cell.location_x * window.pixiApp.scale;
  bunny.y = cell.location_y * window.pixiApp.scale*-1;
  window.pixiApp.container.addChild(bunny);
}
