
var g_currentIndex = 0;
var g_contentObjects = [];

function InitActionBar() {

    var treeNodes = UI.GetControl('TREE_contentObjects').GetAllNodes();
    for (var i in treeNodes) {
        treeNodes[i].OnBeforeActivate.RegisterMethod(RefreshActionBar);
    }
    RefreshActionBar();
}

function OnViewerLoad() {

	// get content objects from root data	
	var rootNode = UI.GetControl('TREE_contentObjects').GetRoot();
	var contentObjectsJson = rootNode.GetData('ContentObjects');
	g_contentObjects = eval(contentObjectsJson);
	
	// load first content object
	g_currentIndex = 0;
	LoadCurrentContentObject();
	
	InitActionBar();
}

function GetCurrentIndex() {

    return g_currentIndex;
}

function GetFirstIndex() {

    return 0;
}

function GetLastIndex() {

    return g_contentObjects.length - 1;
}

function MovePrev() {

	g_currentIndex = GetPrevIndex();
	LoadCurrentContentObject();
	RefreshActionBar();
}

function MoveNext() {

	g_currentIndex = GetNextIndex();
	LoadCurrentContentObject();
	RefreshActionBar();
}

function GetPrevIndex() {

	return (g_currentIndex == 0) ?
		g_contentObjects.length - 1 :
		g_currentIndex - 1;
}

function GetNextIndex() {

	return ( g_currentIndex == g_contentObjects.length - 1 ) ?
		0 :
		g_currentIndex + 1;
}

function UpdateCurrentIndex( currentKey ) {

	for( var i = 0; i < g_contentObjects.length; i++ ) {
		if (currentKey == g_contentObjects[i].RowIndex) {
			g_currentIndex = i;
			return;
		}
	}
}

function LoadContentObjectById( loId ) {

	// find object with given loId
	for( var i = 0; i < g_contentObjects.length; i++ ) {
		if (loId == g_contentObjects[i].LoId) {
			g_currentIndex = i;
			LoadCurrentContentObject();
			return true;
		}
	}
	
	return false;
}

function LoadCurrentContentObject() {

	var co = g_contentObjects[g_currentIndex];
	LoadContentObject(co);
}

function LoadContentObject( co ) {

	// activate content object node in tree
	var tree = UI.GetControl('TREE_contentObjects');
	var currentNode = tree.GetNodeByKey( co.RowIndex );
	tree.SetActiveNode( currentNode );

	// load content object in iframe
	LoadContentObjectFrame( co.RowIndex, co.Location );
}

function LoadContentObjectFrame( key, location ) {

	UpdateCurrentIndex( key );
	LoadContentObjectFrameWithLocation( location );
}

function LoadContentObjectFrameWithLocation( location ) {

	var ni = new D2L.NavInfo();
	ni.SetNavigation( location );
	ni.SetTarget( 'frmContentObject' );
	Nav.Go( ni );
}

function ToggleToc() {

	var btn1 = UI.GetControl( 'AB_nav' ).GetItem( 'actToggleTocDisplayHide' );
	var btn2 = UI.GetControl( 'AB_nav' ).GetItem( 'actToggleTocDisplayShow' );
	var splitLayout = UI.GetControl('SPLT_main');
	var panelToc = splitLayout.GetPanelByKey('toc');
	if (panelToc.GetIsHidden()) {
		panelToc.Show();
		btn1.SetIsVisible( true );
		btn2.SetIsVisible( false );
	} else {
		panelToc.Hide();
		btn1.SetIsVisible( false );
		btn2.SetIsVisible( true );
	}
}

function RefreshActionBar() {

    var actionBar = UI.GetControl('AB_nav');

    var btnPrev = actionBar.GetItem('actPrev');
    var btnDisabledPrev = actionBar.GetItem('actDisabledPrev');
    if (GetCurrentIndex() == GetFirstIndex()) {
        btnPrev.Hide();
        btnDisabledPrev.Show();
    } else {
        btnPrev.Show();
        btnDisabledPrev.Hide();
    }

    var btnNext = actionBar.GetItem('actNext');
    var btnDisabledNext = actionBar.GetItem('actDisabledNext');
    if (GetCurrentIndex() == GetLastIndex()) {
        btnNext.Hide();
        btnDisabledNext.Show();
    } else {
        btnNext.Show();
        btnDisabledNext.Hide();
    }
}
